@extends('layouts.app')

@section('contenido')
    <h1>Editar Ente Coformador: {{ $entes->RazonSocial }}</h1>

    <form action="{{ route('Entecoformador.update', $entes->NIS) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Tipo Doc (ID):</label>
        <input type="number" name="Tdoc" value="{{ $entes->Tdoc }}" required>

        <label>NIT / Número Documento:</label>
        <input type="number" name="Numdoc" value="{{ $entes->Numdoc }}" required>

        <label>Razón Social:</label>
        <input type="text" name="RazonSocial" value="{{ $entes->RazonSocial }}" required>

        <label>Dirección:</label>
        <input type="text" name="Direccion" value="{{ $entes->Direccion }}">

        <label>Teléfono:</label>
        <input type="text" name="Telefono" value="{{ $entes->Telefono }}">

        <label>Correo Institucional:</label>
        <input type="email" name="CorreoInstitucional" value="{{ $entes->CorreoInstitucional }}">

        <br>
        <button type="submit" style="background: #39a900; color: white; margin-top: 10px; padding: 8px 20px; border: none; cursor: pointer;">
            Actualizar Ente
        </button>
        <a href="{{ route('Entecoformador.index') }}" style="margin-left: 10px; color: #666; text-decoration: none;">Cancelar</a>
    </form>
@endsection
