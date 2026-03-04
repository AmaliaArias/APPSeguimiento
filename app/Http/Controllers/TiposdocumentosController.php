<?php

namespace App\Http\Controllers;

use App\Models\tiposdocumentos;
use Illuminate\Http\Request;

class TiposdocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');

        // Filtra por NIS o por la descripción/nombre del tipo de documento
        $tiposdocumentos = \App\Models\tiposdocumentos::when($buscar, function ($query, $buscar) {
            return $query->where('NIS', 'LIKE', "%$buscar%")
                ->orWhere('Denominacion', 'LIKE', "%$buscar%");
        })->get();

        return view('Tiposdocumentos.index', compact('tiposdocumentos', 'buscar'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tiposdocumentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $v = \Validator::make($request->all(), [
            'Denominacion'  => ['required'],
            'Observaciones' => ['nullable'], // nullable por si quieren dejarlo vacío
        ]);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }

        $tipo = new \App\Models\Tiposdocumentos();
        $tipo->Denominacion = $request->Denominacion;
        $tipo->Observaciones = $request->Observaciones;
        $tipo->save();

        return redirect()->route('Tiposdocumentos.index')
            ->with('success', '¡Tipo de documento creado!');
    }

    public function show($nis)
    {
        $tipodocumento = \App\Models\tiposdocumentos::findOrFail($nis);
        return view('Tiposdocumentos.show', compact('tipodocumento'));
    }

    public function edit($nis)
    {
        $tipodocumento = \App\Models\tiposdocumentos::findOrFail($nis);
        return view('Tiposdocumentos.edit', compact('tipodocumento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nis)
    {
        $request->validate([

            'Denominacion' => 'required',
            'Observaciones' => 'required',
        ]);

        $tipo = \App\Models\tiposdocumentos::findOrFail($nis);

        $tipo->Denominacion = $request->Denominacion;
        $tipo->Observaciones = $request->Observaciones;
        $tipo->save();

        return redirect()->route('Tiposdocumentos.index')->with('success', 'Tipo de documento actualizado correctamente');
    }

    public function destroy($nis)
    {
        try {
            $tiposdocumentos = \App\Models\tiposdocumentos::findOrFail($nis);
            $tiposdocumentos->delete();
            return redirect()->route('Tiposdocumentos.index')->with('success', 'Tipo de documento eliminado.');
        } catch (\Exception $e) {
            return redirect()->route('Tiposdocumentos.index')->with('error', 'No se puede eliminar: está asignado a un aprendiz o instructor.');
        }
    }
}
