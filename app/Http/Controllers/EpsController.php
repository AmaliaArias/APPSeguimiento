<?php

namespace App\Http\Controllers;

use App\Models\eps;
use App\Models\tiposdocumentos;
use Illuminate\Http\Request;

class EpsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');

        // Filtra por NIS o por la Denominación de la EPS
        $eps = \App\Models\Eps::when($buscar, function ($query, $buscar) {
            return $query->where('Numdoc', 'LIKE', "%$buscar%")
                ->orWhere('Denominacion', 'LIKE', "%$buscar%");
        })->get();

        return view('Eps.index', compact('eps', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $v = \Validator::make($request->all(), [
            'Numdoc'        => ['required'],
            'Denominacion'  => ['required'],
            'Observaciones' => ['nullable'],
        ]);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }

        $eps = new \App\Models\Eps();
        $eps->Numdoc = $request->Numdoc;
        $eps->Denominacion = $request->Denominacion;
        $eps->Observaciones = $request->Observaciones;
        $eps->save();

        return redirect()->route('Eps.index')
            ->with('success', 'EPS guardada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($nis)
    {
        $eps = \App\Models\Eps::findOrFail($nis);
        return view('Eps.show', compact('eps'));
    }

    public function edit($nis)
    {
        $eps = \App\Models\Eps::findOrFail($nis);
        return view('Eps.edit', compact('eps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nis)
    {
        $eps = \App\Models\Eps::findOrFail($nis);

        $eps->Numdoc = $request->Numdoc;
        $eps->Denominacion = $request->Denominacion;
        $eps->Observaciones = $request->Observaciones;

        $eps->save();

        return redirect()->route('Eps.index')->with('success', 'EPS actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nis)
    {
        try {
            $eps = \App\Models\eps::findOrFail($nis);
            $eps->delete();
            return redirect()->route('Eps.index')->with('success', 'EPS eliminada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('Eps.index')->with('error', 'No se puede eliminar: hay personas afiliadas a esta EPS.');
        }
    }
}
