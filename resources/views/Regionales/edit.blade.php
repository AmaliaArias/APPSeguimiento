@extends('layouts.app')

@section('contenido')
    <h1>Editar Regional: {{ $regional->Denominacion }}</h1>

    <form action="{{ route('Regionales.update', $regional->NIS) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label>Código:</label><br>
            <input type="text" name="Codigo" value="{{ $regional->Codigo }}" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Denominación:</label><br>
            <input type="text" name="Denominacion" value="{{ $regional->Denominacion }}" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Observaciones:</label><br>
            <textarea name="Observaciones" rows="3">{{ $regional->Observaciones }}</textarea>
        </div>

        <button type="submit" style="background: #39a900; color: white; padding: 10px 20px; border: none; cursor: pointer;">Actualizar</button>
        <a href="{{ route('Regionales.index') }}" style="margin-left: 10px;">Cancelar</a>
    </form>
@endsection
