<?php

namespace App\Http\Controllers;

use App\Models\Bitacoras;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BitacorasController extends Controller
{
    public function index()
    {
        $nis_aprendiz = 5; // NIS de prueba para Amalia

        // 1. Traemos las bitácoras del aprendiz ordenadas
        $bitacoras = Bitacoras::where('tbl_aprendiz_NIS', $nis_aprendiz)
            ->orderBy('numero_bitacora', 'asc')
            ->get();

        // 2. Lógica para habilitar la siguiente
        $ultimaBitacora = $bitacoras->last();
        $habilitarSiguiente = false;
        $mensajeBloqueo = "";
        $siguienteNumero = 1;

        if (!$ultimaBitacora) {
            // Si no hay ninguna, habilitamos la #1
            $habilitarSiguiente = true;
        } else {
            $siguienteNumero = $ultimaBitacora->numero_bitacora + 1;

            if ($siguienteNumero > 12) {
                $mensajeBloqueo = "Ya has completado tus 12 bitácoras reglamentarias.";
            } else {
                // REGLA: ¿Está aprobada?
                $estaAprobada = ($ultimaBitacora->estado === 'Aprobada');

                // REGLA: ¿Pasaron 5 días desde que se creó la última?
                $fechaEnvio = Carbon::parse($ultimaBitacora->created_at);
                $diasTranscurridos = $fechaEnvio->diffInDays(now());
                $pasaronCincoDias = ($diasTranscurridos >= 5);

                if ($estaAprobada || $pasaronCincoDias) {
                    $habilitarSiguiente = true;
                } else {
                    $diasRestantes = 5 - $diasTranscurridos;
                    $mensajeBloqueo = "La Bitácora #$siguienteNumero se habilitará cuando la #$ultimaBitacora->numero_bitacora sea aprobada o en $diasRestantes días.";
                }
            }
        }

        return view('Bitacoras.index', compact('bitacoras', 'habilitarSiguiente', 'siguienteNumero', 'mensajeBloqueo'));
    }

    public function create()
    {
        $nis_aprendiz = 5;
        // Calculamos el siguiente número para que el formulario ya lo tenga
        $ultima = Bitacoras::where('tbl_aprendiz_NIS', $nis_aprendiz)->max('numero_bitacora');
        $siguiente = $ultima ? $ultima + 1 : 1;

        return view('Bitacoras.create', compact('siguiente'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero_bitacora' => 'required|integer',
            'fechainicio' => 'required|date',
            'fechafin' => 'required|date',
            'descripcion_actividades' => 'required',
            'evidencia_file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = $request->all();
        $data['tbl_aprendiz_NIS'] = 5; // Asignamos el NIS fijo por ahora
        $data['estado'] = 'Pendiente'; // Toda bitácora nueva nace en Pendiente

        if ($request->hasFile('evidencia_file')) {
            $path = $request->file('evidencia_file')->store('bitacoras_evidencias', 'public');
            $data['evidencias'] = $path;
        }

        Bitacoras::create($data);

        return redirect()->route('Bitacoras.index')->with('success', 'Bitácora #' . $request->numero_bitacora . ' enviada correctamente.');
    }

    // Los demás métodos (edit, update, destroy) se mantienen igual...
    public function edit($id) { $bitacora = Bitacoras::findOrFail($id); return view('Bitacoras.edit', compact('bitacora')); }
    public function update(Request $request, $id) { /* Tu lógica de update */ }
}
