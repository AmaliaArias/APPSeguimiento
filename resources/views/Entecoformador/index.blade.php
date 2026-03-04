@extends('layouts.app')

@section('contenido')

    <h1>Lista de Entes Coformadores</h1>

    {{-- Barra de busqueda--}}
    <div style="margin-bottom: 20px;">
        <form action="{{ route('Entecoformador.index') }}" method="GET" style="display: flex; gap: 10px;">
            <input type="text" name="buscar" value="{{ $buscar }}" placeholder="Buscar por Razón Social" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 300px;">
            <button type="submit" style="background: #39a900; color: white; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer;">Consultar</button>
            <a href="{{ route('Entecoformador.index') }}" style="background: #666; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px;">Limpiar</a>
        </form>
    </div>

    <div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
        <a href="{{ route('Entecoformador.create') }}"
           style="background: #39a900; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-weight: bold;">
            + Crear Nuevo
        </a>
    </div>

    <table border="1"> <thead>
        <tr>

            <th>Tipo Doc (NIS)</th>
            <th>Número de Documento</th>
            <th>Razón Social</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Correo Institucional</th>
            <th style="text-align: center;">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($entes as $item)
            <tr>

                <td>{{ $item->Tdoc }}</td>
                <td>{{ $item->Numdoc }}</td>
                <td>{{ $item->RazonSocial }}</td>
                <td>{{ $item->Direccion }}</td>
                <td>{{ $item->Telefono }}</td>
                <td>{{ $item->CorreoInstitucional }}</td>
                <td style="text-align: center;">
                    <form action="{{ route('Entecoformador.destroy', $item->NIS) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete"
                                onclick="return confirm('¿Deseas eliminar este Entecoformador?')">
                            Eliminar
                        </button>

                        <a href="{{ route('Entecoformador.edit', $item->NIS) }}"
                           style="background: #ffc107; color: black; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 13px;">Editar</a>

                        <a href="{{ route('Entecoformador.show', $item->NIS) }}"
                           style="background: #07ffcd; color: black; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 13px;">Ver Detalle</a>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
