@extends('layouts.app')

@section('contenido')


    <h1>Lista de Centros de Formación</h1>

    {{-- Barra de busqueda--}}
    <div style="margin-bottom: 20px;">
        <form action="{{ route('Centrosdeformacion.index') }}" method="GET" style="display: flex; gap: 10px;">
            <input type="text" name="buscar" value="{{ $buscar }}" placeholder="Buscar por Nombre..." style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 300px;">
            <button type="submit" style="background: #39a900; color: white; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer;">Consultar</button>
            <a href="{{ route('Centrosdeformacion.index') }}" style="background: #666; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px;">Limpiar</a>
        </form>
    </div>


    <div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
        <a href="{{ route('Centrosdeformacion.create') }}"
           style="background: #39a900; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-weight: bold;">
            + Crear Nuevo
        </a>
    </div>

    <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
        <tr style="background-color: #39a900; color: white;">
            <th>Código</th>
            <th>Denominación</th>
            <th>Dirección</th>
            <th>Observaciones</th>
            <th>Ficha Asociada</th>
            <th>Regional</th>
            <th style="text-align: center;">Acciones</th>
        </tr>

        </thead>
        <tbody>
        @foreach($centros as $item)
            <tr>
                <td>{{ $item->Codigo }}</td>
                <td>{{ $item->Denominacion }}</td>
                <td>{{ $item->Direccion }}</td>
                <td>{{ $item->Observaciones }}</td>
                <td>{{ $centro->ficha->Codigo ?? 'N/A' }} - {{ $centro->ficha->Denominacion ?? '' }}</td>
                <td>{{ $centro->regional->Denominacion ?? 'Sin asignar' }}</td>
                <td style="text-align: center;">
                    <form action="{{ route('Centrosdeformacion.destroy', $item->NIS) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete"
                                onclick="return confirm('¿Deseas eliminar este Centro de Formación?')">
                            Eliminar
                        </button>

                        <a href="{{ route('Centrosdeformacion.edit', $item->NIS) }}"
                           style="background: #ffc107; color: black; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 13px;">Editar</a>

                        <a href="{{ route('Centrosdeformacion.show', $item->NIS) }}"
                           style="background: #07ffcd; color: black; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 13px;">Ver Detalle</a>

                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
