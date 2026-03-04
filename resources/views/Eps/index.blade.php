@extends('layouts.app')

@section('contenido')

    {{--
    <h1>Lista de EPS</h1>

    <table>
        <thead>
        <tr>
            <th>NIS</th>
            <th>Número de Documento</th>
            <th>Denominación</th>
            <th>Observaciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($eps as $item)
            <tr>
                <td>{{ $item->NIS }}</td>
                <td>{{ $item->Numdoc }}</td>
                <td>{{ $item->Denominacion }}</td>
                <td>{{ $item->Observaciones }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
     --}}

    <h1>Lista de EPS</h1>

    {{-- Barra de busqueda--}}
    <div style="margin-bottom: 20px;">
        <form action="{{ route('Eps.index') }}" method="GET" style="display: flex; gap: 10px;">
            <input type="text" name="buscar" value="{{ $buscar }}" placeholder="Buscar por Codigo o Nombre..." style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 300px;">
            <button type="submit" style="background: #39a900; color: white; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer;">Consultar</button>
            <a href="{{ route('Eps.index') }}" style="background: #666; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px;">Limpiar</a>
        </form>
    </div>

    <div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
        <a href="{{ route('Eps.create') }}"
           style="background: #39a900; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-weight: bold;">
            + Crear Nuevo
        </a>
    </div>


    <table border="1" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
        <tr style="background-color: #39a900; color: white;">

            <th>Numero de Documento</th>
            <th>Denominación</th>
            <th>Observaciones</th>
            <th style="text-align: center;">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($eps as $item)
            <tr>

                <td>{{ $item->Numdoc }}</td>
                <td>{{ $item->Denominacion }}</td>
                <td>{{ $item->Observaciones }}</td>
                <td style="text-align: center;">
                    {{-- El NIS se sigue usando internamente para las rutas, aunque no se vea --}}
                    <a href="{{ route('Eps.show', $item->NIS) }}" style="background: #007bff; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 13px;">Ver</a>

                    <a href="{{ route('Eps.edit', $item->NIS) }}" style="background: #ffc107; color: black; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 13px; margin: 0 5px;">Editar</a>

                    <form action="{{ route('Eps.destroy', $item->NIS) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: #dc3545; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer; font-size: 13px;" onclick="return confirm('¿Eliminar esta EPS?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
