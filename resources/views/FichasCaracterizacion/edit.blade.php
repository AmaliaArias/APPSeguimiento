@extends('layouts.app')

@section('contenido')
    <h1>Editar Ficha: {{ $ficha->Codigo }}</h1>

    <form action="{{ route('Fichasdecaracterizacion.update', $ficha->NIS) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Código:</label>
        <input type="number" name="Codigo" value="{{ $ficha->Codigo }}" required>

        <label>Denominación:</label>
        <input type="text" name="Denominacion" value="{{ $ficha->Denominacion }}" required>

        <label>Cupo:</label>
        <input type="number" name="Cupo" value="{{ $ficha->Cupo }}">

        <label>Fecha Inicio:</label>
        <input type="date" name="FechaInicio" value="{{ $ficha->FechaInicio }}">

        <label>Fecha Fin:</label>
        <input type="date" name="FechaFin" value="{{ $ficha->FechaFin }}">

        <label>Centro de Formación:</label>
        <select name="tbl_centrosdeformacion_NIS">
            @foreach($centros as $c)
                <option value="{{ $c->NIS }}" {{ $ficha->tbl_centrosdeformacion_NIS == $c->NIS ? 'selected' : '' }}>
                    {{ $c->Denominacion }}
                </option>
            @endforeach
        </select>

        <label>Programa:</label>
        <select name="tbl_programasdeformacion_NIS">
            @foreach($programas as $p)
                <option value="{{ $p->NIS }}" {{ $ficha->tbl_programasdeformacion_NIS == $p->NIS ? 'selected' : '' }}>
                    {{ $p->Denominacion }}
                </option>
            @endforeach
        </select>

        <label>Observaciones:</label>
        <textarea name="Observaciones">{{ $ficha->Observaciones }}</textarea>

        <br>
        <button type="submit" style="background: #39a900; color: white; margin-top: 10px; padding: 10px 25px; border: none; cursor: pointer;">
            Actualizar Ficha
        </button>
    </form>
@endsection
