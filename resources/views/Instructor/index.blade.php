@extends('layouts.app')

@section('contenido')


    <h1>Lista de Instructores</h1>

    {{-- Barra de busqueda--}}
    <div style="margin-bottom: 20px;">
        <form action="{{ route('Instructor.index') }}" method="GET" style="display: flex; gap: 10px;">
            <input type="text" name="buscar" value="{{ $buscar }}" placeholder="Buscar por Nombre, documento..." style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 300px;">
            <button type="submit" style="background: #39a900; color: white; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer;">Consultar</button>
            <a href="{{ route('Instructor.index') }}" style="background: #666; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px;">Limpiar</a>
        </form>
    </div>

    <div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
        <a href="{{ route('Instructor.create') }}"
           style="background: #39a900; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-weight: bold;">
            + Crear Nuevo
        </a>
    </div>


    <table>
        <thead>
        <tr>
            <th>T. Documento</th>
            <th>Documento</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Correo Institucional</th>
            <th>Correo Personal</th>
            <th>Sexo</th>
            <th>Fecha de Nacimiento</th>
            <th>Rol Administrativo</th>
            <th>EPS</th>

            <th style="text-align: center;">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($instructores as $item)
            <tr>
                <td>{{ $item->Tdoc }}</td>
                <td>{{ $item->Numdoc }}</td>
                <td>{{ $item->Nombres }}</td>
                <td>{{ $item->Apellidos }}</td>
                <td>{{ $item->Direccion }}</td>
                <td>{{ $item->Telefono }}</td>
                <td>{{ $item->CorreoInstitucional }}</td>
                <td>{{ $item->CorreoPersonal }}</td>
                <td>{{ $item->Sexo }}</td>
                <td>{{ $item->FechaNac }}</td>
                <td>{{ $item->tbl_rolesadministrativos_NIS }}</td>
                <td>{{ $item->tbl_eps_NIS }}</td>
                <td style="text-align: center;">
                    <form action="{{ route('Instructor.destroy', $item->NIS) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete"
                                onclick="return confirm('¿Deseas eliminar este Instructor?')">
                            Eliminar
                        </button>

                        <a href="{{ route('Instructor.show', $item->NIS) }}" style="color: #007bff; text-decoration: none; margin-right: 10px;">Ver</a>
                        <a href="{{ route('Instructor.edit', $item->NIS) }}" style="color: #39a900; text-decoration: none;">Editar</a>

                    </form>
                </td>
            </tr>
    @endforeach

@endsection
