<?php

namespace App\Http\Controllers\Aprendiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Para usar la base de datos

class PracticaController extends Controller
{
    public function create()
    {
        // Traemos los datos de Amalia (NIS 5) para la vista
        $aprendiz = DB::table('tbl_aprendiz')->where('NIS', 5)->first();
        return view('aprendiz.practica_create', compact('aprendiz'));
    }


    public function store(Request $request)
    {
        DB::table('tbl_registro_practicas')->insert([
            'tbl_aprendiz_NIS'   => 5,
            'modalidad'          => $request->modalidad,
            'empresa'            => $request->empresa,
            'nit_empresa'        => $request->nit_empresa,
            'area_dependencia'   => $request->area_dependencia,
            'cargo_aprendiz'     => $request->cargo_aprendiz,
            'horario'            => $request->horario,
            'fecha_inicio'       => $request->fecha_inicio,
            'fecha_final'        => $request->fecha_final,
            'nombre_jefe'        => $request->nombre_jefe,
            'cargo_jefe'         => $request->cargo_jefe,
            'email_jefe'         => $request->email_jefe,
            'telefono_jefe'      => $request->telefono_jefe,
            'funciones_relevantes'=> $request->funciones_relevantes,
            'created_at'         => now(),
            'updated_at'         => now(),
        ]);

        return redirect()->route('aprendiz.dashboard')->with('success', '¡Práctica registrada correctamente!');
    }
}
