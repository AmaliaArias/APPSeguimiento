<?php

namespace App\Http\Controllers;

use App\Models\entecoformador;
use Illuminate\Http\Request;

class EntecoformadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');
        // Consultamos usando los nombres de tu tabla: Numdoc o RazonSocial
        $entes = \App\Models\Entecoformador::where('Numdoc', 'LIKE', "%$buscar%")
            ->orWhere('RazonSocial', 'LIKE', "%$buscar%")
            ->get();

        // Enviamos 'entes' para la tabla y 'buscar' para que el texto no se borre del cuadro
        return view('Entecoformador.index', compact('entes', 'buscar'));
    }

    public function create()
    {
        $entes = entecoformador::all();
        return view('Entecoformador.create', compact('entes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Tdoc' => 'required|integer', // Validamos que sea un número
            'Numdoc' => 'required',
            'RazonSocial' => 'required',
            'Direccion' => 'required', // Sin tilde para que coincida con el formulario
            'Telefono' => 'required',
            'CorreoInstitucional' => 'required|email'
        ]);

        $entes = new entecoformador();
        $entes->Tdoc = $request->Tdoc;
        $entes->Numdoc = $request->Numdoc;
        $entes->RazonSocial = $request->RazonSocial;
        $entes->Direccion = $request->Direccion; // Asegúrate que en la DB ya no tenga tilde
        $entes->Telefono = $request->Telefono;
        $entes->CorreoInstitucional = $request->CorreoInstitucional;
        $entes->save();

        return redirect()->route('Entecoformador.index')->with('success', '¡Excelente! Ente guardado.');
    }


    /**
     * Display the specified resource.
     */
    public function show($nis)
    {
        $entes = \App\Models\Entecoformador::findOrFail($nis);
        return view('Entecoformador.show', compact('entes')); // IMPORTANTE: enviamos 'ente'
    }

    public function edit($nis)
    {
        $entes = \App\Models\Entecoformador::findOrFail($nis);
        return view('Entecoformador.edit', compact('entes')); // ESTO ARREGLA EL ERROR DE LA IMAGEN 52a37f.png
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nis)
    {
        $entes = \App\Models\Entecoformador::findOrFail($nis);

        // Mapeo según tu tabla tbl_entecoformador
        $entes->Tdoc = $request->Tdoc;
        $entes->Numdoc = $request->Numdoc;
        $entes->RazonSocial = $request->RazonSocial;
        $entes->Direccion = $request->Direccion;
        $entes->Telefono = $request->Telefono;
        $entes->CorreoInstitucional = $request->CorreoInstitucional;

        $entes->save();

        return redirect()->route('Entecoformador.index')->with('success', 'Ente actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nis)
    {
        try {
            $entes = \App\Models\entecoformador::findOrFail($nis);
            $entes->delete();

            return redirect()->route('Entecoformador.index')->with('success', '¡Entecoformador eliminado con éxito!');
        } catch (\Exception $e) {
            // Por si la regional tiene centros de formación asociados
            return redirect()->route('Entecoformador.index')->with('error', 'No se puede eliminar: El Entecoformador tiene registros asociados.');
        }
    }
}
