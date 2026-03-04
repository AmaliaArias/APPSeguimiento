@extends('layouts.app')

@section('contenido')
    <h1>Editar Aprendiz: {{ $aprendiz->Nombres }}</h1>

    <form action="{{ route('Aprendiz.update', $aprendiz->NIS) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Tipo Documento:</label>
        <select name="tbl_tiposdocumentos_NIS" required>
            @foreach($tiposDoc as $tipo)
                <option value="{{ $tipo->NIS }}" {{ $aprendiz->tbl_tiposdocumentos_NIS == $tipo->NIS ? 'selected' : '' }}>
                    {{ $tipo->Denominacion }}
                </option>
            @endforeach
        </select>

        <label>Número Documento:</label>
        <input type="number" name="Numdoc" value="{{ $aprendiz->Numdoc }}" required>

        <label>Nombres:</label>
        <input type="text" name="Nombres" value="{{ $aprendiz->Nombres }}" required>

        <label>Apellidos:</label>
        <input type="text" name="Apellidos" value="{{ $aprendiz->Apellidos }}" required>

        <label>Dirección:</label>
        <input type="text" name="Direccion" value="{{ $aprendiz->Direccion }}">

        <label>Teléfono:</label>
        <input type="text" name="Telefono" value="{{ $aprendiz->Telefono }}">

        <label>Correo Institucional:</label>
        <input type="email" name="CorreoInstitucional" value="{{ $aprendiz->CorreoInstitucional }}">

        <label>Sexo:</label>
        <select name="Sexo">
            <option value="M" {{ $aprendiz->Sexo == 'M' ? 'selected' : '' }}>Masculino</option>
            <option value="F" {{ $aprendiz->Sexo == 'F' ? 'selected' : '' }}>Femenino</option>
        </select>

        <label>Fecha Nacimiento:</label>
        <input type="date" name="FechaNac" value="{{ $aprendiz->FechaNac }}">

        <br>
        <button type="submit" style="background: #39a900; color: white; margin-top: 15px; padding: 8px 20px; border: none; cursor: pointer;">
            Actualizar Aprendiz
        </button>
        <a href="{{ route('Aprendiz.index') }}" style="margin-left: 10px; text-decoration: none; color: #666;">Cancelar</a>
    </form>
@endsection
