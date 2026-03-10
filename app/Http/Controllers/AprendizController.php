<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz; // Asegúrate que empiece por Mayúscula si así está el archivo
use App\Models\Tiposdocumentos;
use App\Models\Fichasdecaracterizacion;
use App\Models\Eps; // Importamos el modelo de EPS
use Illuminate\Http\Request;

class AprendizController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');

        // Usamos Eager Loading (with) para que la tabla cargue rápido las relaciones
        $aprendices = Aprendiz::with(['tipoDocumento', 'ficha', 'eps'])
            ->when($buscar, function ($query, $buscar) {
                return $query->where('Numdoc', 'LIKE', "%$buscar%")
                    ->orWhere('Nombres', 'LIKE', "%$buscar%")
                    ->orWhere('Apellidos', 'LIKE', "%$buscar%");
            })->get();

        return view('Aprendiz.index', compact('aprendices', 'buscar'));
    }

    public function create()
    {
        // Cargamos todos los datos necesarios para los selects del formulario
        $tiposDoc = Tiposdocumentos::all();
        $fichas = Fichasdecaracterizacion::all();
        $eps = Eps::all();

        return view('Aprendiz.create', compact('tiposDoc', 'fichas', 'eps'));
    }

    public function store(Request $request)
    {
        // Validamos con los nombres exactos de tu DB
        $request->validate([
            'tbl_tiposdocumentos_NIS' => 'required',
            'Numdoc' => 'required|unique:tbl_aprendiz,Numdoc',
            'Nombres' => 'required',
            'Apellidos' => 'required',
            'CorreoInstitucional' => 'required|email',
            'tbl_fichasdecaracterizacion_NIS' => 'required',
            'tbl_eps_NIS' => 'required'
        ]);

        $aprendiz = new Aprendiz();
        $aprendiz->Numdoc = $request->Numdoc;
        $aprendiz->Nombres = $request->Nombres;
        $aprendiz->Apellidos = $request->Apellidos;
        $aprendiz->Direccion = $request->Direccion;
        $aprendiz->Telefono = $request->Telefono;
        $aprendiz->CorreoInstitucional = $request->CorreoInstitucional;
        $aprendiz->CorreoPersonal = $request->CorreoPersonal;
        $aprendiz->Sexo = $request->Sexo; // Guardará 1 o 0
        $aprendiz->FechaNac = $request->FechaNac;

        // Llaves Foráneas exactas de tu tabla
        $aprendiz->tbl_tiposdocumentos_NIS = $request->tbl_tiposdocumentos_NIS;
        $aprendiz->tbl_fichasdecaracterizacion_NIS = $request->tbl_fichasdecaracterizacion_NIS;
        $aprendiz->tbl_eps_NIS = $request->tbl_eps_NIS;

        // Nota: Si Tdoc es un campo duplicado del tipo de doc, lo llenamos también
        $aprendiz->Tdoc = $request->tbl_tiposdocumentos_NIS;

        $aprendiz->save();

        return redirect()->route('Aprendiz.index')->with('success', 'Aprendiz registrado con éxito');
    }

    public function show($nis)
    {
        // Cargamos el aprendiz con sus relaciones para la Ficha Técnica
        $aprendiz = Aprendiz::with(['tipoDocumento', 'ficha', 'eps'])->findOrFail($nis);
        return view('Aprendiz.show', compact('aprendiz'));
    }

    public function edit($nis)
    {
        $aprendiz = Aprendiz::findOrFail($nis);

        // Necesitamos todos los catálogos para poder cambiar la ficha o la EPS
        $tiposDoc = Tiposdocumentos::all();
        $fichas = Fichasdecaracterizacion::all();
        $eps = Eps::all();

        return view('Aprendiz.edit', compact('aprendiz', 'tiposDoc', 'fichas', 'eps'));
    }

    public function update(Request $request, $nis)
    {
        $aprendiz = Aprendiz::findOrFail($nis);

        $aprendiz->Numdoc = $request->Numdoc;
        $aprendiz->Nombres = $request->Nombres;
        $aprendiz->Apellidos = $request->Apellidos;
        $aprendiz->Direccion = $request->Direccion;
        $aprendiz->Telefono = $request->Telefono;
        $aprendiz->CorreoInstitucional = $request->CorreoInstitucional;
        $aprendiz->CorreoPersonal = $request->CorreoPersonal;
        $aprendiz->Sexo = $request->Sexo;
        $aprendiz->FechaNac = $request->FechaNac;

        // Actualizamos las llaves foráneas
        $aprendiz->tbl_tiposdocumentos_NIS = $request->tbl_tiposdocumentos_NIS;
        $aprendiz->tbl_fichasdecaracterizacion_NIS = $request->tbl_fichasdecaracterizacion_NIS;
        $aprendiz->tbl_eps_NIS = $request->tbl_eps_NIS;

        $aprendiz->save();

        return redirect()->route('Aprendiz.index')->with('success', 'Aprendiz actualizado correctamente');
    }

    public function destroy($nis)
    {
        try {
            $aprendiz = Aprendiz::findOrFail($nis);
            $aprendiz->delete();
            return redirect()->route('Aprendiz.index')->with('success', '¡Aprendiz eliminado con éxito!');
        } catch (\Exception $e) {
            return redirect()->route('Aprendiz.index')->with('error', 'Error al eliminar: Existen registros vinculados a este aprendiz.');
        }
    }
}
