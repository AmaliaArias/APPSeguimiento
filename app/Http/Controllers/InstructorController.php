<?php

namespace App\Http\Controllers;

use App\Mail\AsignacionInstructorMail;
use App\Models\instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');
        // Consultar por Número de Documento o Nombres
        $instructores = \App\Models\Instructor::when($buscar, function ($query, $buscar) {
            return $query->where('Numdoc', 'LIKE', "%$buscar%")
                ->orWhere('Nombres', 'LIKE', "%$buscar%");
        })->get();

        return view('Instructor.index', compact('instructores', 'buscar'));
    }

    public function create()
    {
        // Cargamos las tablas para los selects del formulario
        $roles = \App\Models\Rolesadministrativos::all();
        $eps = \App\Models\Eps::all();
        $tiposDoc = \App\Models\Tiposdocumentos::all();

        return view('Instructor.create', compact('roles', 'eps', 'tiposDoc'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Tdoc' => 'required',
            'Numdoc' => 'required',
            'Nombres' => 'required',
            'Apellidos' => 'required',
            'CorreoInstitucional' => 'required|email',

        ]);

        $instructor = new Instructor();
        $instructor->Tdoc = $request->Tdoc;
        $instructor->Numdoc = $request->Numdoc;
        $instructor->Nombres = $request->Nombres;
        $instructor->Apellidos = $request->Apellidos;
        $instructor->Direccion = $request->Direccion;
        $instructor->Telefono = $request->Telefono;
        $instructor->CorreoInstitucional = $request->CorreoInstitucional;
        $instructor->CorreoPersonal = $request->CorreoPersonal;
        $instructor->Sexo = $request->Sexo;
        $instructor->FechaNac = $request->FechaNac;


        $instructor->tbl_rolesadministrativos_NIS = $request->tbl_rolesadministrativos_NIS;
        $instructor->tbl_eps_NIS = $request->tbl_eps_NIS;
        $instructor->tbl_tiposdocumentos_NIS = $request->tbl_tiposdocumentos_NIS;
        $instructor->save();

        return redirect()->route('Instructor.index')->with('success', 'Instructor guardado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($nis)
    {
        $instructor = \App\Models\Instructor::findOrFail($nis);
        $tipoDoc = \App\Models\Tiposdocumentos::where('NIS', $instructor->tbl_tiposdocumentos_NIS)->first();
        $rol = \App\Models\Rolesadministrativos::where('NIS', $instructor->tbl_rolesadministrativos_NIS)->first();

        return view('Instructor.show', compact('instructor', 'tipoDoc', 'rol'));
    }

    public function edit($nis)
    {
        $instructor = \App\Models\Instructor::findOrFail($nis);
        $tiposDoc = \App\Models\Tiposdocumentos::all();
        $roles = \App\Models\Rolesadministrativos::all();

        return view('Instructor.edit', compact('instructor', 'tiposDoc', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nis)
    {
        $instructor = \App\Models\Instructor::findOrFail($nis);

        $instructor->Numdoc = $request->Numdoc;
        $instructor->Nombres = $request->Nombres;
        $instructor->Apellidos = $request->Apellidos;
        $instructor->Direccion = $request->Direccion;
        $instructor->Telefono = $request->Telefono;
        $instructor->CorreoInstitucional = $request->CorreoInstitucional;
        $instructor->tbl_tiposdocumentos_NIS = $request->tbl_tiposdocumentos_NIS;
        $instructor->tbl_rolesadministrativos_NIS = $request->tbl_rolesadministrativos_NIS;

        $instructor->save();

        notify( new AsignacionInstructorMail($instructor->Nombres, $instructor->CorreoInstitucional));

        return redirect()->route('Instructor.index')->with('success', 'Instructor actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nis)
    {
        try {
            $instructor = \App\Models\instructor::findOrFail($nis);
            $instructor->delete();



            return redirect()->route('Instructor.index')->with('success', '¡Instructor eliminado con éxito!');
        } catch (\Exception $e) {
            //  asociados
            return redirect()->route('Instructor.index')->with('error', 'No se puede eliminar: El Instructor tiene registros asociados.');
        }
    }
}
