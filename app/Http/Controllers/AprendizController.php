<?php

namespace App\Http\Controllers;

use App\Models\aprendiz;
use Illuminate\Http\Request;

class AprendizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');
        // Consultar por Número de Documento, Nombres o Apellidos
        $aprendices = \App\Models\Aprendiz::when($buscar, function ($query, $buscar) {
            return $query->where('Numdoc', 'LIKE', "%$buscar%")
                ->orWhere('Nombres', 'LIKE', "%$buscar%")
                ->orWhere('Apellidos', 'LIKE', "%$buscar%");
        })->get();

        return view('Aprendiz.index', compact('aprendices', 'buscar'));
    }

    public function create()
    {
        // Cargamos las tablas para los selects según tus FK de la imagen
        $tiposdocumentos = \App\Models\Tiposdocumentos::all();
        $fichasdecaracterizacion = \App\Models\Fichasdecaracterizacion::all();

        return view('Aprendiz.create', compact('tiposdocumentos', 'fichasdecaracterizacion'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Tdoc' => 'required',
            'Numdoc' => 'required',
            'Nombres' => 'required',
            'Apellidos' => 'required',
            'CorreoInstitucional' => 'required|email',
            'tbl_fichasdecaracterizacion_NIS' => 'required'
        ]);

        $aprendiz = new Aprendiz();
        $aprendiz->Tdoc = $request->Tdoc;
        $aprendiz->Numdoc = $request->Numdoc;
        $aprendiz->Nombres = $request->Nombres;
        $aprendiz->Apellidos = $request->Apellidos;
        $aprendiz->Direccion = $request->Direccion;
        $aprendiz->Telefono = $request->Telefono;
        $aprendiz->CorreoInstitucional = $request->CorreoInstitucional;
        $aprendiz->CorreoPersonal = $request->CorreoPersonal;
        $aprendiz->Sexo = $request->Sexo;
        $aprendiz->FechaNac = $request->FechaNac;

        // Llaves Foráneas según tu imagen tbl_aprendiz
        $aprendiz->tbl_tiposdocumentos_NIS = $request->tbl_tiposdocumentos_NIS;
        $aprendiz->tbl_fichasdecaracterizacion_NIS = $request->tbl_fichasdecaracterizacion_NIS;

        // Estas dos se suelen heredar de la ficha, pero si tu DB pide llenarlas:
        $aprendiz->tbl_fichasdecaracterizacion_tbl_centrosdeformacion_NIS = $request->centro_nis;
        $aprendiz->tbl_fichasdecaracterizacion_tbl_programasdeformacion_NIS = $request->programa_nis;

        $aprendiz->save();

        return redirect()->route('Aprendiz.index')->with('success', 'Aprendiz registrado con éxito');
    }


    /**
     * Display the specified resource.
     */
    public function show($nis)
    {
        // Buscamos el aprendiz con su relación de tipo de documento
        $aprendiz = \App\Models\Aprendiz::findOrFail($nis);

        // Si tienes la relación configurada en el Modelo, puedes traer el nombre del tipo de doc
        $tipoDoc = \App\Models\Tiposdocumentos::where('NIS', $aprendiz->tbl_tiposdocumentos_NIS)->first();

        return view('Aprendiz.show', compact('aprendiz', 'tipoDoc'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nis)
    {
        $aprendiz = \App\Models\Aprendiz::findOrFail($nis);
        // Cargamos tipos de documentos para el select del formulario
        $tiposDoc = \App\Models\Tiposdocumentos::all();

        return view('Aprendiz.edit', compact('aprendiz', 'tiposDoc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nis)
    {
        $aprendiz = \App\Models\Aprendiz::findOrFail($nis);

        // Sincronizamos todas las variables de tu tabla
        $aprendiz->Numdoc = $request->Numdoc;
        $aprendiz->Nombres = $request->Nombres;
        $aprendiz->Apellidos = $request->Apellidos;
        $aprendiz->Direccion = $request->Direccion;
        $aprendiz->Telefono = $request->Telefono;
        $aprendiz->CorreoInstitucional = $request->CorreoInstitucional;
        $aprendiz->CorreoPersonal = $request->CorreoPersonal;
        $aprendiz->Sexo = $request->Sexo;
        $aprendiz->FechaNac = $request->FechaNac;
        $aprendiz->tbl_tiposdocumentos_NIS = $request->tbl_tiposdocumentos_NIS;

        $aprendiz->save();

        return redirect()->route('Aprendiz.index')->with('success', 'Aprendiz actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nis)
    {
        try {
            $aprendiz = \App\Models\aprendiz::findOrFail($nis);
            $aprendiz->delete();

            return redirect()->route('Aprendiz.index')->with('success', '¡Aprendiz eliminado/a con éxito!');
        } catch (\Exception $e) {
            // Por si la regional tiene centros de formación asociados
            return redirect()->route('Aprendiz.index')->with('error', 'No se puede eliminar: El/La aprendiz tiene registros asociados.');
        }
    }
}
