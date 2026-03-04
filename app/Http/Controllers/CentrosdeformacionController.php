<?php

namespace App\Http\Controllers;

use App\Models\centrosdeformacion;
use Illuminate\Http\Request;

class CentrosdeformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');

        // Cargamos relaciones para evitar errores de "Property of non-object"
        $centros = \App\Models\Centrosdeformacion::with(['ficha', 'regional'])
            ->when($buscar, function ($query, $buscar) {
                return $query->where('Denominacion', 'LIKE', "%$buscar%")
                    ->orWhere('Codigo', 'LIKE', "%$buscar%");
            })->get();

        return view('Centrosdeformacion.index', compact('centros', 'buscar'));
    }

    public function create()
    {
        // Aquí podrías cargar las regionales si quieres un select
        $regionales = \App\Models\Regionales::all();
        return view('Centrosdeformacion.create', compact('regionales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Codigo' => 'required',
            'Denominacion' => 'required',
            'tbl_regionales_NIS' => 'required'
        ]);

        $centro = new Centrosdeformacion();
        $centro->Codigo = $request->Codigo;
        $centro->Denominacion = $request->Denominacion;
        $centro->Direccion = $request->Direccion;
        $centro->Observaciones = $request->Observaciones;
        $centro->tbl_fichasdecaracterizacion_NIS = 123;
        $centro->tbl_regionales_NIS = $request->tbl_regionales_NIS;
        $centro->save();

        return redirect()->route('Centrosdeformacion.index')->with('success', 'Centro de formación guardado');
    }

    /**
     * Display the specified resource.
     */
    public function edit($nis)
    {
        $centro = \App\Models\Centrosdeformacion::findOrFail($nis);
        $fichas = \App\Models\Fichasdecaracterizacion::all(); // Para el select de fichas
        $regionales = \App\Models\Regionales::all();        // Para el select de regionales

        return view('Centrosdeformacion.edit', compact('centro', 'fichas', 'regionales'));
    }

    public function show($nis)
    {
        $centro = \App\Models\Centrosdeformacion::with(['ficha', 'regional'])->findOrFail($nis);
        return view('Centrosdeformacion.show', compact('centro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nis)
    {
        $centro = \App\Models\Centrosdeformacion::findOrFail($nis);
        $centro->update($request->all()); // Actualiza Codigo, Denominacion, Direccion, etc.

        return redirect()->route('Centrosdeformacion.index')->with('success', 'Centro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nis)
    {
        try {
            $centrosdeformacion = \App\Models\Regionales::findOrFail($nis);
            $centrosdeformacion->delete();

            return redirect()->route('Centrosdeformacion.index')->with('success', '¡Centro de Formación eliminado con éxito!');
        } catch (\Exception $e) {
            // datos asociados
            return redirect()->route('Centrosdeformacion.index')->with('error', 'No se puede eliminar: El Centro de Formación tiene registros asociados.');
        }
    }
}
