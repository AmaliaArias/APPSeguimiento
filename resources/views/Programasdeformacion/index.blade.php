@extends('layouts.app')

@section('contenido')
    {{--
<h1>Lista de Programas de Formación</h1>

<table>
    <thead>
    <tr>
        <th>NIS</th>
        <th>Código</th>
        <th>Denominación</th>
        <th>Observaciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($programas as $programa)
        <tr>
            <td>{{ $programa->NIS }}</td>
            <td>{{ $programa->Codigo }}</td>
            <td>{{ $programa->Denominacion }}</td>
            <td>{{ $programa->Observaciones }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
--}}
<div style="display: flex; justify-content: space-between; align-items: center;">
    <h1>Programas de Formación</h1>
</div>

    {{-- Barra de busqueda--}}
    <div style="margin-bottom: 20px;">
        <form action="{{ route('programasdeformacion.index') }}" method="GET" style="display: flex; gap: 10px;">
            <input type="text" name="buscar" value="{{ $buscar }}" placeholder="Buscar por Codigo o Nombre..." style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 300px;">
            <button type="submit" style="background: #39a900; color: white; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer;">Consultar</button>
            <a href="{{ route('programasdeformacion.index') }}" style="background: #666; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px;">Limpiar</a>
        </form>
    </div>

    <div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
        <a href="{{ route('programasdeformacion.create') }}"
           style="background: #39a900; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-weight: bold;">
            + Crear Nuevo
        </a>
    </div>

<table>
    <thead>
    <tr>
        <th>Código</th>
        <th>Denominación</th>
        <th>Observaciones</th>
        <th style="text-align: center;">Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($programas as $programa)
        <tr>
            <td>{{ $programa->Codigo }}</td>
            <td>{{ $programa->Denominacion }}</td>
            <td>{{ $programa->Observaciones }}</td>
            <td style="text-align: center;">
                <form action="{{ route('programasdeformacion.destroy', $programa->NIS) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete"
                            onclick="return confirm('¿Estás seguro de que deseas eliminar este programa?')">
                        Eliminar
                    </button>

                    <a href="{{ route('programasdeformacion.edit', $programa->NIS) }}"
                       style="background: #ffc107; color: black; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 13px;">Editar</a>

                    <a href="{{ route('programasdeformacion.show', $programa->NIS) }}"
                       style="background: #07ffcd; color: black; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 13px;">Ver Detalle</a>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
