<?php

namespace App\Http\Controllers;

use App\Mail\AsignacionInstructorMail;
use App\Models\Instructor; // Corregido: instructor con mayúscula
use App\Models\Rolesadministrativos;
use App\Models\Eps;
use App\Models\Tiposdocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // Añadido para enviar correos

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');

        // Cargamos las relaciones 'tipoDocumento', 'rol' y 'eps' de una vez
        $instructores = \App\Models\Instructor::with(['tipoDocumento', 'rol', 'eps'])
            ->when($buscar, function ($query, $buscar) {
                return $query->where('Numdoc', 'LIKE', "%$buscar%")
                    ->orWhere('Nombres', 'LIKE', "%$buscar%");
            })->get();

        return view('Instructor.index', compact('instructores', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Cargamos las tablas para los selects del formulario
        $roles = Rolesadministrativos::all();
        $eps = Eps::all();
        $tiposDoc = Tiposdocumentos::all();

        return view('instructor.create', compact('roles', 'eps', 'tiposDoc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validación Sincronizada con el Formulario
        $request->validate([
            'tbl_tiposdocumentos_NIS' => 'required|exists:tbl_tiposdocumentos,NIS',
            'Numdoc' => 'required|unique:tbl_instructor,Numdoc',
            'Nombres' => 'required|string|max:100',
            'Apellidos' => 'required|string|max:100',
            'Direccion' => 'nullable|string|max:255',
            'Telefono' => 'nullable|string|max:20',
            'CorreoInstitucional' => 'required|email|unique:tbl_instructor,CorreoInstitucional',
            'CorreoPersonal' => 'nullable|email',
            'Sexo' => 'nullable|in:1,0', // Cambiado a 1,0 para coincidir con tu HTML
            'FechaNac' => 'nullable|date',
            'tbl_rolesadministrativos_NIS' => 'required|exists:tbl_rolesadministrativos,NIS',
            'tbl_eps_NIS' => 'required|exists:tbl_eps,NIS',
        ], [
            'Numdoc.unique' => 'Este número de documento ya está registrado',
            'CorreoInstitucional.unique' => 'Este correo institucional ya está registrado',
            'tbl_tiposdocumentos_NIS.required' => 'El tipo de documento es obligatorio',
        ]);

        // 2. Preparar los datos y solucionar el error de 'Tdoc'
        $datos = $request->all();

        // Asignamos el NIS al campo Tdoc porque tu BD lo marca como obligatorio (NOT NULL)
        // Esto evita el SQLSTATE[HY000]: General error: 1364 Field 'Tdoc' doesn't have a default value
        $datos['Tdoc'] = $request->tbl_tiposdocumentos_NIS;

        // 3. Crear el registro (Asegúrate que 'Tdoc' esté en el $fillable del modelo)
        $instructor = \App\Models\Instructor::create($datos);

        // 4. Notificación por Correo
        try {
            if ($instructor->CorreoInstitucional) {
                \Mail::to($instructor->CorreoPersonal ?? $instructor->CorreoInstitucional)
                    ->send(new AsignacionInstructorMail($instructor));
            }
        } catch (\Exception $e) {
            \Log::error('Error enviando correo: ' . $e->getMessage());
        }

        return redirect()->route('instructor.index')
            ->with('success', 'Instructor guardado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($nis)
    {
        $instructor = Instructor::with(['rol', 'eps', 'tipoDocumento'])
            ->findOrFail($nis);

        return view('instructor.show', compact('instructor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
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
        $instructor = Instructor::findOrFail($nis);

        // Validación para actualización
        $request->validate([
            'Tdoc' => 'required|exists:tbl_tiposdocumentos,NIS',
            'Numdoc' => 'required|unique:tbl_instructor,Numdoc,' . $nis . ',NIS', // Ignorar el actual
            'Nombres' => 'required|string|max:100',
            'Apellidos' => 'required|string|max:100',
            'Direccion' => 'nullable|string|max:255',
            'Telefono' => 'nullable|string|max:20',
            'CorreoInstitucional' => 'required|email|unique:tbl_instructor,CorreoInstitucional,' . $nis . ',NIS',
            'CorreoPersonal' => 'nullable|email',
            'Sexo' => 'nullable|in:M,F',
            'FechaNac' => 'nullable|date',
            'tbl_rolesadministrativos_NIS' => 'nullable|exists:tbl_rolesadministrativos,NIS',
            'tbl_eps_NIS' => 'nullable|exists:tbl_eps,NIS',
        ]);

        // Actualizar usando fill() y save() para respetar $fillable
        $instructor->fill($request->all());
        $instructor->save();

        return redirect()->route('instructor.index')
            ->with('success', 'instructor actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nis)
    {
        try {
            $instructor = Instructor::findOrFail($nis);
            $instructor->delete();

            return redirect()->route('instructor.index')
                ->with('success', '¡instructor eliminado con éxito!');

        } catch (\Illuminate\Database\QueryException $e) {
            // Error por clave foránea
            return redirect()->route('instructor.index')
                ->with('error', 'No se puede eliminar: El instructor tiene registros asociados.');
        } catch (\Exception $e) {
            return redirect()->route('instructor.index')
                ->with('error', 'Error al eliminar el instructor: ' . $e->getMessage());
        }
    }

    /**
     * Método adicional para buscar instructores (API o AJAX)
     */
    public function search(Request $request)
    {
        $term = $request->get('q');

        $instructores = Instructor::where('Numdoc', 'LIKE', "%$term%")
            ->orWhere('Nombres', 'LIKE', "%$term%")
            ->orWhere('Apellidos', 'LIKE', "%$term%")
            ->limit(10)
            ->get(['NIS', 'Nombres', 'Apellidos', 'Numdoc']);

        return response()->json($instructores);
    }


}
