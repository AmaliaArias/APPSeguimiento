
@extends('layouts.app')

@section('contenido')
    <h1>Editar EPS: {{ $eps->Denominacion }}</h1>

    <form action="{{ route('Eps.update', $eps->NIS) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label>Número Documento:</label><br>
            <input type="number" name="Numdoc" value="{{ $eps->Numdoc }}" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Denominación:</label><br>
            <input type="text" name="Denominacion" value="{{ $eps->Denominacion }}" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Observaciones:</label><br>
            <textarea name="Observaciones">{{ $eps->Observaciones }}</textarea>
        </div>

        <button type="submit" style="background: #39a900; color: white; padding: 10px 20px; border: none; cursor: pointer;">
            Actualizar
        </button>
        <a href="{{ route('Eps.index') }}">Cancelar</a>
    </form>
@endsection
