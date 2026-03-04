@extends('layouts.app') {{-- Esto llama a la plantilla base --}}

@section('contenido') {{-- Esto define qué va dentro del yield --}}


<h1>Lista de Fichas de Caracterización</h1>

{{-- Barra de busqueda--}}
<div style="margin-bottom: 20px;">
    <form action="{{ route('Fichasdecaracterizacion.index') }}" method="GET" style="display: flex; gap: 10px;">
        <input type="text" name="buscar" value="{{ $buscar }}" placeholder="Buscar por Codigo o Denominación..." style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 300px;">
        <button type="submit" style="background: #39a900; color: white; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer;">Consultar</button>
        <a href="{{ route('Fichasdecaracterizacion.index') }}" style="background: #666; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px;">Limpiar</a>
    </form>
</div>

<div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
    <a href="{{ route('Fichasdecaracterizacion.create') }}"
       style="background: #39a900; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-weight: bold;">
        + Crear Nuevo
    </a>
</div>


<table>
    <thead>
    <tr>
        <th>NIS</th>
        <th>Código</th>
        <th>Denominación</th>
        <th>Centro de Formación</th> {{-- Nueva columna --}}
        <th>Programa</th>
        <th>Cupo</th>
        <th>Inicio</th>
        <th>Fin</th>
        <th>Observaciones</th>
        <th style="text-align: center;">Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($fichasdecaracterizacion as $ficha)
        <tr>
            <td>{{ $ficha->NIS }}</td>
            <td>{{ $ficha->Codigo }}</td>
            <td>{{ $ficha->Denominacion }}</td>
            {{-- Mostramos el nombre del centro y programa --}}
            <td>{{ $ficha->centro->Denominacion ?? 'No asignado' }}</td>
            <td>{{ $ficha->programa->Denominacion ?? 'No asignado' }}</td>
            <td>{{ $ficha->Cupo }}</td>
            <td>{{ $ficha->FechaInicio }}</td>
            <td>{{ $ficha->FechaFin }}</td>
            <td>{{ $ficha->Observaciones }}</td>
            <td style="text-align: center;">


                <form action="{{ route('Fichasdecaracterizacion.destroy', $ficha->NIS) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete"
                            onclick="return confirm('¿Deseas eliminar esta Ficha de caracterizacion?')">
                        Eliminar
                    </button>

                    <a href="{{ route('Fichasdecaracterizacion.edit', $ficha->NIS) }}"
                       style="background: #ffc107; color: black; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 13px;">Editar</a>

                    <a href="{{ route('Fichasdecaracterizacion.show', $ficha->NIS) }}"
                       style="background: #07ffcd; color: black; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 13px;">Ver Detalle</a>

                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
