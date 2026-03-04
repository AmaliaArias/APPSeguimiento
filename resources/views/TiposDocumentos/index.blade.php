@extends('layouts.app')

@section('contenido')

    {{--
    <h1>Lista de Tipos de Documentos</h1>

    <table>
        <thead>
        <tr>
            <th>NIS</th>
            <th>Denominación</th>
            <th>Observaciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tiposdocumentos as $tipodocumento)
            <tr>
                <td>{{ $tipodocumento->NIS }}</td>
                <td>{{ $tipodocumento->Denominacion }}</td>
                <td>{{ $tipodocumento->Observaciones }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
      --}}



    <h1>Lista de Tipos de Documentos</h1>


    <div style="margin-bottom: 20px;">
        <form action="{{ route('Tiposdocumentos.index') }}" method="GET" style="display: flex; gap: 10px;">
            <input type="text" name="buscar" value="{{ $buscar }}" placeholder="Buscar por NIS o Nombre..." style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 300px;">
            <button type="submit" style="background: #39a900; color: white; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer;">Consultar</button>
            <a href="{{ route('Tiposdocumentos.index') }}" style="background: #666; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px;">Limpiar</a>
        </form>
    </div>

    <div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
        <a href="{{ route('Tiposdocumentos.create') }}"
           style="background: #39a900; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-weight: bold;">
            + Crear Nuevo
        </a>
    </div>

    <table>
        <thead>
        <tr>
            <th>NIS</th>
            <th>Denominación</th>
            <th>Observaciones</th>
            <th style="text-align: center;">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tiposdocumentos as $tipodocumento)
            <tr>
                <td>{{ $tipodocumento->NIS }}</td>
                <td>{{ $tipodocumento->Denominacion }}</td>
                <td>{{ $tipodocumento->Observaciones }}</td>
                <td style="text-align: center;">
                    <form action="{{ route('Tiposdocumentos.destroy', $tipodocumento->NIS) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete"
                                onclick="return confirm('¿Deseas eliminar este Tipo de Documento?')">
                            Eliminar
                        </button>

                        <a href="{{ route('Tiposdocumentos.edit', $tipodocumento->NIS) }}"
                           style="background: #ffc107; color: black; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 13px;">Editar</a>

                        <a href="{{ route('Tiposdocumentos.show', $tipodocumento->NIS) }}"
                           style="background: #07ffcd; color: black; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 13px;">Ver Detalle</a>

                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>



@endsection
