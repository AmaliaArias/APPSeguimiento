<?php

namespace App\Http\Controllers;

use App\Models\rolesadministrativos;
use Illuminate\Http\Request;

class RolesadministrativosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');

        // Filtra por NIS o por la Denominación de la EPS
        $rolesadministrativos = \App\Models\Rolesadministrativos::when($buscar, function ($query, $buscar) {
            return $query->where('Descripcion', 'LIKE', "%$buscar%");
        })->get();

        return view('Rolesadministrativos.index', compact('rolesadministrativos', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Rolesadministrativos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Descripcion'  => 'required|string|max:100',
            'anexo_camara'  => 'nullable|mimes:pdf|max:3072'
        ]);

        // 2. Procesar el archivo PDF si el usuario lo subió
        if ($request->hasFile('anexo_camara')) {

            // Definir la ruta de la carpeta
            $rutaCarpeta = public_path('uploads/clientes/camara/');

            // Crear la carpeta si no existe (con permisos de escritura)
            if (!file_exists($rutaCarpeta)) {
                mkdir($rutaCarpeta, 0777, true);
            }

            // Generar nombre único: cam_7889_1715600.pdf
            // Nota: He cambiado $request->Numdoc por $request->Denominacion para tu caso
            $nombreArchivo = 'cam_' . time() . '.' . $request->file('anexo_camara')->extension();

            // Mover el archivo físico a la carpeta
            $request->file('anexo_camara')->move($rutaCarpeta, $nombreArchivo);

            // Guardar solo el nombre del archivo en el array de datos
            $data['anexo_camara'] = $nombreArchivo;
        }
        // 3. Crear el registro en la base de datos
        // Asegúrate de que el modelo se llame Rolesadministrativos o el correspondiente
        \App\Models\Rolesadministrativos::create($data);

        // En lugar de ir al index de la tabla...
        return redirect()->route('dashboard')->with('success', 'Registro guardado');

    }


    /**
     * Display the specified resource.
     */
    public function show($nis)
    {
        // Cambiamos el nombre a $rolesadministrativo para que coincida con tu vista
        $rol = \App\Models\Rolesadministrativos::findOrFail($nis);
        return view('Rolesadministrativos.show', compact('rol'));
    }

    public function edit($nis)
    {
        $rol = \App\Models\Rolesadministrativos::findOrFail($nis);
        return view('Rolesadministrativos.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nis)
    {
        $rol = \App\Models\Rolesadministrativos::findOrFail($nis);

        $data = $request->validate([
            'Descripcion'  => 'required|string|max:100',
            'anexo_camara' => 'nullable|mimes:pdf|max:3072'
        ]);

        if ($request->hasFile('anexo_camara')) {
            $rutaCarpeta = public_path('uploads/clientes/camara/');

            // 1. Borrar el archivo viejo si existe para no llenar el disco
            if ($rol->anexo_camara && file_exists($rutaCarpeta . $rol->anexo_camara)) {
                unlink($rutaCarpeta . $rol->anexo_camara);
            }

            // 2. Subir el nuevo archivo
            $nombreArchivo = 'cam_' . time() . '.' . $request->file('anexo_camara')->extension();
            $request->file('anexo_camara')->move($rutaCarpeta, $nombreArchivo);

            $rol->anexo_camara = $nombreArchivo;
        }

        $rol->Descripcion = $request->Descripcion;
        $rol->save();

        return redirect()->route('Rolesadministrativos.index')->with('success', 'Rol y documento actualizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nis)
    {
        try {
            $rol = \App\Models\Rolesadministrativos::findOrFail($nis);
            $rol->delete();

            return redirect()->route('Rolesadministrativos.index')->with('success', '¡Rol administrativo eliminado con éxito!');
        } catch (\Exception $e) {
            // Por si la regional tiene centros de formación asociados
            return redirect()->route('Rolesadministrativos.index')->with('error', 'No se puede eliminar: El Rol Administrativo tiene registros asociados.');
        }
    }
}
