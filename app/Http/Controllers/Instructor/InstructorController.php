<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Models\Aprendiz;
use App\Models\Bitacora;


class InstructorController extends Controller
{
    public function index(Request $request)
    {
        // Usamos el ID del usuario logueado para filtrar
        $nis_instructor = auth()->id();

        $aprendices = DB::table('tbl_aprendiz')
            ->leftJoin('tbl_registro_practicas', 'tbl_aprendiz.NIS', '=', 'tbl_registro_practicas.tbl_aprendiz_NIS')
            ->where('tbl_aprendiz.instructor_id', $nis_instructor)
            ->select(
                'tbl_aprendiz.NIS',
                'tbl_aprendiz.Nombres',
                'tbl_aprendiz.Apellidos',
                'tbl_aprendiz.Numdoc',
                'tbl_registro_practicas.empresa' // Corregido de nombre_empresa a empresa
            )
            ->get();

        $pendientes = DB::table('tbl_bitacoras')
            ->join('tbl_aprendiz', 'tbl_bitacoras.tbl_aprendiz_NIS', '=', 'tbl_aprendiz.NIS')
            ->where('tbl_aprendiz.instructor_id', $nis_instructor)
            ->where('tbl_bitacoras.estado', 'Pendiente')
            ->count();

        // IMPORTANTE: La vista es 'instructor.dashboard'
        return view('instructor.dashboard', compact('aprendices', 'pendientes'));
    }

    // ESTA ES LA FUNCIÓN QUE TE FALTABA
    public function verSeguimiento($nis)
    {
        // 1. Buscamos los datos del aprendiz
        $aprendiz = DB::table('tbl_aprendiz')
            ->where('NIS', $nis)
            ->first();

        // 2. Traemos todas sus bitácoras (las 12 o las que lleve)
        $bitacoras = DB::table('tbl_bitacoras')
            ->where('tbl_aprendiz_NIS', $nis)
            ->orderBy('numero_bitacora', 'asc')
            ->get();

        return view('instructor.seguimiento', compact('aprendiz', 'bitacoras'));
    }

    public function calificar(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|in:Aprobada,Rechazada',
            'observaciones_instructor' => 'nullable|string'
        ]);

        DB::table('tbl_bitacoras')
            ->where('id', $id)
            ->update([
                'estado' => $request->estado,
                'observaciones_instructor' => $request->observaciones_instructor,
                'updated_at' => now()
            ]);

        return back()->with('success', 'La bitácora ha sido calificada correctamente.');
    }


    public function misAprendices(Request $request)
    {
        $buscar = $request->get('buscar');

        // Cambiamos el nombre de la variable a $instructores
        // para que la vista no lance el error de "variable indefinida"
        $instructores = \App\Models\Aprendiz::has('bitacoras')
            ->when($buscar, function ($query, $buscar) {
                return $query->where('Nombres', 'LIKE', "%$buscar%")
                    ->orWhere('Numdoc', 'LIKE', "%$buscar%");
            })
            ->with('bitacoras')
            ->get();

        return view('instructor.index', compact('instructores', 'buscar'));
    }

    // 2. FUNCIÓN PARA EL SEGUIMIENTO DETALLADO (La que usa tu archivo seguimiento.blade.php)
    public function seguimiento($id)
    {
        // Usamos NIS que es como tienes tu tabla tbl_aprendiz
        $aprendiz = Aprendiz::where('NIS', $id)->firstOrFail();

        // Obtiene las bitácoras vinculadas a ese NIS
        $bitacoras = $aprendiz->bitacoras;

        return view('instructor.seguimiento', compact('aprendiz', 'bitacoras'));
    }

}
