@extends('layouts.app')

@section('contenido')
    <h1>Editar Instructor: {{ $instructor->Nombres }}</h1>

    <form action="{{ route('Instructor.update', $instructor->NIS) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Tipo Documento:</label>
        <select name="tbl_tiposdocumentos_NIS" required>
            @foreach($tiposDoc as $tipo)
                <option value="{{ $tipo->NIS }}" {{ $instructor->tbl_tiposdocumentos_NIS == $tipo->NIS ? 'selected' : '' }}>
                    {{ $tipo->Denominacion }}
                </option>
            @endforeach
        </select>

        <label>Documento:</label>
        <input type="number" name="Numdoc" value="{{ $instructor->Numdoc }}" required>

        <label>Nombres:</label>
        <input type="text" name="Nombres" value="{{ $instructor->Nombres }}" required>

        <label>Apellidos:</label>
        <input type="text" name="Apellidos" value="{{ $instructor->Apellidos }}" required>

        <label>Rol Administrativo:</label>
        <select name="tbl_rolesadministrativos_NIS">
            @foreach($roles as $rol)
                <option value="{{ $rol->NIS }}" {{ $instructor->tbl_rolesadministrativos_NIS == $rol->NIS ? 'selected' : '' }}>
                    {{ $rol->descripcion }}
                </option>
            @endforeach
        </select>

        <label>Teléfono:</label>
        <input type="text" name="Telefono" value="{{ $instructor->Telefono }}">

        <label>Dirección:</label>
        <input type="text" name="Direccion" value="{{ $instructor->Direccion }}">

        <label>Correo Institucional:</label>
        <input type="email" name="CorreoInstitucional" value="{{ $instructor->CorreoInstitucional }}">

        <br>
        <button type="submit" style="background: #39a900; color: white; margin-top: 10px; padding: 8px 20px; border: none; cursor: pointer;">
            Actualizar Instructor
        </button>
        <a href="{{ route('Instructor.index') }}" style="margin-left: 10px; color: #666;">Cancelar</a>
    </form>
@endsection
