<?php

namespace App\Http\Controllers;

use App\Mail\AsignacionInstructorMail;
use App\Models\eps;
use App\Models\fichasdecaracterizacion;
use App\Models\instructor;
use App\Notifications\AsignacionInstructorEmail;
use Illuminate\Http\Request;

class FichasdecaracterizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');

        // Cargamos las relaciones 'centro' y 'programa' (asegúrate de tenerlas en el Modelo)
        $fichasdecaracterizacion = \App\Models\Fichasdecaracterizacion::with(['centro', 'programa', 'instructor'])
            ->when($buscar, function ($query, $buscar) {
                return $query->where('Codigo', 'LIKE', "%$buscar%")
                    ->orWhere('Denominacion', 'LIKE', "%$buscar%");
            })->get();

        return view('FichasCaracterizacion.index', compact('fichasdecaracterizacion', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Consultamos todos los centros y programas para llenar los select
        $centros = \App\Models\Centrosdeformacion::all();
        $programas = \App\Models\Programasdeformacion::all();
        $instructores = instructor::all();

        // Enviamos los datos a la vista (recuerda usar el nombre de carpeta FichasCaracterizacion)
        return view('FichasCaracterizacion.create', compact('centros', 'programas', 'instructores'));
    }

    public function store(Request $request)
    {
        // Validamos todos los campos de tu tabla
        $v = \Validator::make($request->all(), [
            'Codigo'        => ['required', 'integer'],
            'Denominacion'  => ['required', 'max:100'],
            'Cupo'          => ['required', 'integer'],
            'FechaInicio'   => ['required', 'date'],
            'FechaFin'      => ['required', 'date'],
            'Observaciones' => ['nullable', 'max:200'],
            'tbl_instructor_NIS' =>['required']
        ]);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }

        $ficha = new \App\Models\Fichasdecaracterizacion();
        $ficha->Codigo = $request->Codigo;
        $ficha->Denominacion = $request->Denominacion;
        $ficha->Cupo = $request->Cupo;
        $ficha->FechaInicio = $request->FechaInicio;
        $ficha->FechaFin = $request->FechaFin;
        $ficha->Observaciones = $request->Observaciones;
        $ficha->tbl_instructor_NIS = $request->tbl_instructor_NIS;

        // Guardamos los NIS seleccionados en el formulario
        $ficha->tbl_centrosdeformacion_NIS = $request->tbl_centrosdeformacion_NIS;
        $ficha->tbl_programasdeformacion_NIS = $request->tbl_programasdeformacion_NIS;

        $ficha->save();

        $ficha->load('instructor', 'programa');


       $ficha->instructor->notify(new AsignacionInstructorEmail($ficha));


        return redirect()->route('Fichasdecaracterizacion.index')
            ->with('success', 'Ficha creada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show($nis)
    {
        $ficha = \App\Models\Fichasdecaracterizacion::findOrFail($nis);
        return view('FichasCaracterizacion.show', compact('ficha'));
    }

    public function edit($nis)
    {
        $ficha = \App\Models\Fichasdecaracterizacion::findOrFail($nis);
        $centros = \App\Models\Centrosdeformacion::all();
        $programas = \App\Models\Programasdeformacion::all();

        return view('FichasCaracterizacion.edit', compact('ficha', 'centros', 'programas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nis)
    {
        $ficha = \App\Models\Fichasdecaracterizacion::findOrFail($nis);

        // Asignación exacta de campos
        $ficha->Codigo = $request->Codigo;
        $ficha->Denominacion = $request->Denominacion;
        $ficha->Cupo = $request->Cupo;
        $ficha->FechaInicio = $request->FechaInicio;
        $ficha->FechaFin = $request->FechaFin;
        $ficha->Observaciones = $request->Observaciones;
        $ficha->tbl_centrosdeformacion_NIS = $request->tbl_centrosdeformacion_NIS;
        $ficha->tbl_programasdeformacion_NIS = $request->tbl_programasdeformacion_NIS;

        $ficha->save();

        // 1. Buscamos los datos del instructor que acabas de asignar
        $instructor = \App\Models\Instructor::find($request->tbl_instructor_NIS);

        // 2. Si el instructor existe y tiene correo, mandamos el mail
        if ($instructor && $instructor->CorreoInstitucional) {
            Mail::to($instructor->CorreoInstitucional)->send(new AsignacionInstructorMail($instructor, $ficha));
        }

        return redirect()->route('Fichasdecaracterizacion.index')->with('success', 'Ficha actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nis)
    {
        try {
            $ficha = \App\Models\Fichasdecaracterizacion::findOrFail($nis);
            $ficha->delete();

            return redirect()->route('Fichasdecaracterizacion.index')->with('success', '¡Ficha de caracterizacion eliminada con éxito!');
        } catch (\Exception $e) {
            //  asociados
            return redirect()->route('Fichasdecaracterizacion.index')->with('error', 'No se puede eliminar: La Ficha de caracterizacion tiene registros asociados.');
        }
    }
}
