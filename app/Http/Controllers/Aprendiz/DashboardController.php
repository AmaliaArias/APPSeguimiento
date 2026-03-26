<?php

namespace App\Http\Controllers\Aprendiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bitacoras;
use Illuminate\Support\Facades\DB; // Importamos DB para consultas rápidas

class DashboardController extends Controller
{
    public function index()
    {
        // Por ahora usamos el NIS 5 que vimos en tu base de datos
        $nis = 5;

        // 1. Datos del Aprendiz (Para mostrar el nombre en el saludo)
        $aprendiz = DB::table('tbl_aprendiz')->where('NIS', $nis)->first();

        // 2. Calculamos el progreso basado en 12 bitácoras
        $aprobadas = Bitacoras::where('tbl_aprendiz_NIS', $nis)
            ->where('estado', 'Aprobada')
            ->count();

        $porcentaje = ($aprobadas / 12) * 100;

        // 3. NUEVO: Verificar si ya existe registro en la tabla de prácticas
        $practicaRegistrada = DB::table('tbl_registro_practicas')
            ->where('tbl_aprendiz_NIS', $nis)
            ->exists(); // Devuelve true si existe, false si no

        // Enviamos todas las variables a la vista
        return view('aprendiz.dashboard', compact('porcentaje', 'aprobadas', 'aprendiz', 'practicaRegistrada'));
    }


    public function buscarInstructor(Request $request)
    {
        $cedula = $request->numdoc;

        // Buscamos al aprendiz por su cédula y traemos a su instructor
        $resultado = DB::table('tbl_aprendiz')
            ->join('tbl_instructor', 'tbl_aprendiz.instructor_id', '=', 'tbl_instructor.NIS')
            ->where('tbl_aprendiz.Numdoc', $cedula)
            ->select(
                'tbl_instructor.Nombres as NomInst',
                'tbl_instructor.Apellidos as ApeInst',
                'tbl_instructor.CorreoInstitucional',
                'tbl_aprendiz.Numdoc as CedulaAprendiz'
            )
            ->first();

        if (!$resultado) {
            return back()->with('error', 'No se encontró un instructor asignado para el documento: ' . $cedula);
        }

        return view('aprendiz.instructor_show', compact('resultado'));
    }

}
