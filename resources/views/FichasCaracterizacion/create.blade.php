@extends('layouts.app')

@section('contenido')
    <h1>Crear Nueva Ficha de Caracterización</h1>

    <form action="{{ route('Fichasdecaracterizacion.store') }}" method="POST">
        @csrf

        <label>Código:</label>
        <input type="number" name="Codigo" required>

        <label>Denominación:</label>
        <input type="text" name="Denominacion" required>

        <label>Cupo:</label>
        <input type="number" name="Cupo" required>

        {{-- Selector de Centro de Formación --}}
        <label>Centro de Formación:</label>
        <select name="tbl_centrosdeformacion_NIS" required>
            <option value="">-- Seleccione un Centro --</option>
            @foreach($centros as $centro)
                <option value="{{ $centro->NIS }}">{{ $centro->Denominacion }}</option>
            @endforeach
        </select>

        {{-- Selector de Programa de Formación --}}
        <label>Programa de Formación:</label>
        <select name="tbl_programasdeformacion_NIS" required>
            <option value="">-- Seleccione un Programa --</option>
            @foreach($programas as $programa)
                <option value="{{ $programa->NIS }}">{{ $programa->Denominacion }}</option>
            @endforeach
        </select>

        <label>Fecha Inicio:</label>
        <input type="date" name="FechaInicio" required>

        <label>Fecha Fin:</label>
        <input type="date" name="FechaFin" required>

        <label>Observaciones:</label>
        <textarea name="Observaciones"></textarea>



        <label >Programa de Formación:</label>
        <select name="tbl_instructor_NIS">
            <option value="">-- Seleccione un Programa --</option>
            @foreach($instructores as $instructor)
                <option value="{{ $instructor->NIS }}">{{ $instructor->Nombres }}</option>
            @endforeach
        </select>

        @error('tbl_instructor_NIS')
            <p>{{$message}}</p>
        @enderror

        <br>
        <button type="submit" style="background: #39a900; color: white; margin-top: 10px; padding: 10px 25px; border: none; cursor: pointer;">
            Guardar Ficha
        </button>
    </form>
@endsection
