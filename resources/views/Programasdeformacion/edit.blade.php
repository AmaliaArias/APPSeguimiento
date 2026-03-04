@extends('layouts.app')

@section('contenido')
    <h1>Editar Programa: {{ $programa->Denominacion }}</h1>

    <form action="{{ route('programasdeformacion.update', $programa->NIS) }}" method="POST">
        @csrf
        @method('PUT') {{-- ¡Importante! Laravel usa PUT para actualizar --}}

        <label>Código:</label>
        <input type="number" name="Codigo" value="{{ $programa->Codigo }}" required>

        <label>Denominación:</label>
        <input type="text" name="Denominacion" value="{{ $programa->Denominacion }}" required>

        <label>Observaciones:</label>
        <textarea name="Observaciones">{{ $programa->Observaciones }}</textarea>

        <button type="submit" style="background: #39a900; color: white; margin-top: 10px;">Actualizar Programa</button>
        <a href="{{ route('programasdeformacion.index') }}">Cancelar</a>
    </form>
@endsection
