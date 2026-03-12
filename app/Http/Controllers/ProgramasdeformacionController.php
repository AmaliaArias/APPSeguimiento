<?php

namespace App\Http\Controllers;

use App\Models\programasdeformacion;
use Illuminate\Http\Request;

class ProgramasdeformacionController extends Controller
{

    public function index(Request $request)
    {
        // Capturamos lo que el usuario escribe en el buscador
        $buscar = $request->get('buscar');

        // Si hay búsqueda, filtra por NIS o por Denominacion
        $programas = \App\Models\programasdeformacion::when($buscar, function ($query, $buscar) {
            return $query->where('Codigo', 'LIKE', "%$buscar%")
                ->orWhere('Denominacion', 'LIKE', "%$buscar%");
        })->get();

        return view('Programasdeformacion.index', compact('programas', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('programasdeformacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validación de los datos
        $v = \Validator::make($request->all(), [
            'Codigo'        => ['required'],
            'Denominacion'  => ['required'],
            'Observaciones' => ['required'],
        ]);
        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }

        // 2. Creación del registro
        $programa = new \App\Models\Programasdeformacion();

        $programa->Codigo = $request->Codigo;
        // Aquí usamos bcrypt para que la denominación sea secreta
        $programa->Denominacion = bcrypt($request->Denominacion);
        $programa->Observaciones = $request->Observaciones;
        $programa->save();

        return redirect()->route('programasdeformacion.index')
            ->with('success', '¡Programa creado con denominación encriptada!');
    }

    /**
     * Display the specified resource.
     */
    public function show($nis)
    {
        // Buscamos el programa específico por su NIS
        $programa = \App\Models\programasdeformacion::findOrFail($nis);

        // Retornamos la vista pasándole el objeto
        return view('programasdeformacion.show', compact('programa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nis)
    {
        // Buscamos el programa por su NIS para llenar el formulario
        $programa = \App\Models\programasdeformacion::findOrFail($nis);
        return view('programasdeformacion.edit', compact('programa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nis)
    {
        $request->validate([
            'Codigo' => 'required',
            'Denominacion' => 'required',
        ]);

        $programa = \App\Models\programasdeformacion::findOrFail($nis);
        $programa->Codigo = $request->Codigo;
        $programa->Denominacion = $request->Denominacion;
        $programa->Observaciones = $request->Observaciones;
        $programa->save();

        return redirect()->route('programasdeformacion.index')->with('success', '¡Programa actualizado con éxito!');
    }

    public function destroy($nis)
    {
        try {
            $programa = \App\Models\programasdeformacion::findOrFail($nis);
            $programa->delete();

            return redirect()->route('programasdeformacion.index')->with('success', '¡Programa eliminado con éxito!');
        } catch (\Exception $e) {
           //asociado
            return redirect()->route('programasdeformacion.index')->with('error', 'No se puede eliminar: El programa tiene registros asociados.');
        }
    }
}
