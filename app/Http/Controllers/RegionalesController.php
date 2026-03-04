<?php

namespace App\Http\Controllers;

use App\Models\regionales;
use Illuminate\Http\Request;

class RegionalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');

        // Filtra por NIS o por Denominación
        $regionales = \App\Models\Regionales::when($buscar, function ($query, $buscar) {
            return $query->where('Codigo', 'LIKE', "%$buscar%")
                ->orWhere('Denominacion', 'LIKE', "%$buscar%");
        })->get();

        return view('Regionales.index', compact('regionales', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('regionales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $v = \Validator::make($request->all(), [
            'Codigo'        => ['required'],
            'Denominacion'  => ['required'],
            'Observaciones'  => ['required'],
        ]);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }

        $regional = new \App\Models\Regionales();
        $regional->Codigo = $request->Codigo;
        $regional->Denominacion = $request->Denominacion;
        $regional->Observaciones = $request->Observaciones;
        $regional->save();

        return redirect()->route('Regionales.index')->with('success', 'Regional creada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show($nis)
    {
        // Buscamos la regional por su NIS
        $regional = \App\Models\Regionales::findOrFail($nis);

        // Retornamos la vista de Regionales
        return view('Regionales.show', compact('regional'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nis)
    {
        $regional = \App\Models\Regionales::findOrFail($nis);
        return view('Regionales.edit', compact('regional'));
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

        $regional = \App\Models\Regionales::findOrFail($nis);
        $regional->Codigo = $request->Codigo;
        $regional->Denominacion = $request->Denominacion;
        $regional->Observaciones = $request->Observaciones;
        $regional->save();

        return redirect()->route('Regionales.index')->with('success', 'Regional actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nis)
    {
        try {
            $regionales = \App\Models\Regionales::findOrFail($nis);
            $regionales->delete();

            return redirect()->route('Regionales.index')->with('success', '¡Regional eliminada con éxito!');
        } catch (\Exception $e) {
            // Por si la regional tiene centros de formación asociados
            return redirect()->route('Regionales.index')->with('error', 'No se puede eliminar: La regional tiene centros o registros asociados.');
        }
    }
}
