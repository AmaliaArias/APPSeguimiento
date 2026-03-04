@extends('layouts.app')

@section('contenido')
    <h1>Editar Tipo de Documento</h1>
    <form action="{{ route('Tiposdocumentos.update', $tipodocumento->NIS) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label>Denominación:</label><br>
            <input type="text" name="Denominacion" value="{{ $tipodocumento->Denominacion }}" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Observaciones:</label><br>
            <input type="text" name="Observaciones" value="{{ $tipodocumento->Observaciones }}" required>
        </div>
        <button type="submit" style="background: #39a900; color: white; padding: 10px 20px; border: none; cursor: pointer;">Actualizar</button>
        <a href="{{ route('Tiposdocumentos.index') }}" style="margin-left: 10px;">Cancelar</a>
    </form>
@endsection
