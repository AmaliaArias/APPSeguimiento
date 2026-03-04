@extends('layouts.app')

@section('contenido')

    {{--
    <h1>Lista de Roles Administrativos</h1>

    <table>
        <thead>
        <tr>
            <th>NIS</th>
            <th>Descripción</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rolesadministrativos as $rol)
            <tr>
                <td>{{ $rol->NIS }}</td>
                <td>{{ $rol->Descripcion }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
     --}}
    <h1>Lista de Roles Administrativos</h1>

    {{-- Barra de busqueda--}}
    <div style="margin-bottom: 20px;">
        <form action="{{ route('Rolesadministrativos.index') }}" method="GET" style="display: flex; gap: 10px;">
            <input type="text" name="buscar" value="{{ $buscar }}" placeholder="Buscar por Nombre..." style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 300px;">
            <button type="submit" style="background: #39a900; color: white; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer;">Consultar</button>
            <a href="{{ route('Rolesadministrativos.index') }}" style="background: #666; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px;">Limpiar</a>
        </form>
    </div>


    <div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
        <a href="{{ route('Rolesadministrativos.create') }}"
           style="background: #39a900; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-weight: bold;">
            + Crear Nuevo
        </a>
    </div>


    <table>
        <thead>
        <tr>
            <th>NIS</th>
            <th>Descripción</th>
            <th>Anexo (PDF)</th>
            <th style="text-align: center;">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rolesadministrativos as $rol)
            <tr>
                <td>{{ $rol->NIS }}</td>
                <td>{{ $rol->Descripcion }}</td>

                <td style="text-align: center;">
                    @if($rol->anexo_camara)
                        <a href="{{ asset('uploads/clientes/camara/' . $rol->anexo_camara) }}"
                           target="_blank"
                           style="color: #ff0000; text-decoration: none; font-weight: bold;">
                            <i class="fas fa-file-pdf"></i> Ver PDF
                        </a>
                    @else
                        <span style="color: #999;">Sin anexo</span>
                    @endif
                </td>


                <td style="text-align: center;">
                    <form action="{{ route('Rolesadministrativos.destroy', $rol->NIS) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete"
                                onclick="return confirm('¿Deseas eliminar este Rol Administrativo?')">
                            Eliminar
                        </button>

                        <a href="{{ route('Rolesadministrativos.edit', $rol->NIS) }}"
                           style="background: #ffc107; color: black; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 13px;">Editar</a>

                        <a href="{{ route('Rolesadministrativos.show', $rol->NIS) }}"
                           style="background: #07ffcd; color: black; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 13px;">Ver Detalle</a>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
