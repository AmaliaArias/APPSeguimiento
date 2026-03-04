@extends('layouts.app')

@section('contenido')
    <h1>Editar Roles Administrativos: {{ $rol->Denominacion }}</h1>

    <form action="{{ route('Rolesadministrativos.update', $rol->NIS) }}" method="POST">
        @csrf
        @method('PUT') {{-- ¡Importante! Laravel usa PUT para actualizar --}}

        <label>Descripción:</label>
        <input type="text" name="Descripcion" value="{{ $rol->Descripcion }}" required>

        <br>
        <button type="submit" style="background: #39a900; color: white; margin-top: 10px; padding: 5px 15px; border: none; cursor: pointer;">
            Actualizar Rol Administrativo
        </button>
        <a href="{{ route('Rolesadministrativos.index') }}" style="margin-left: 10px; text-decoration: none; color: #666;">Cancelar</a>
    </form>
@endsection
