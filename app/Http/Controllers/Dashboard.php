<?php

namespace App\Http\Controllers;

use App\Models\aprendiz;
use App\Models\fichasdecaracterizacion;
use App\Models\programasdeformacion;
use App\Models\instructor;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Contamos los registros de cada tabla
        $totalAprendices = \App\Models\aprendiz::count();
        $totalFichas = \App\Models\fichasdecaracterizacion::count();
        $totalProgramas = \App\Models\programasdeformacion::count();
        $totalInstructores = \App\Models\instructor::count();

        return view('dashboard', compact(
            'totalAprendices',
            'totalFichas',
            'totalProgramas',
            'totalInstructores'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
