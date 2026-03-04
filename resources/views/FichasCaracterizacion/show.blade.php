@extends('layouts.app')

@section('contenido')
    <div style="max-width: 600px; margin: 20px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
        <h2 style="color: #39a900; border-bottom: 2px solid #39a900; padding-bottom: 10px;">Ficha: {{ $ficha->Codigo }}</h2>

        <div style="margin-top: 20px; line-height: 2;">
            <p><strong>Denominación:</strong> {{ $ficha->Denominacion }}</p>
            <p><strong>Cupo:</strong> {{ $ficha->Cupo }}</p>
            <p><strong>Fecha Inicio:</strong> {{ $ficha->FechaInicio }}</p>
            <p><strong>Fecha Fin:</strong> {{ $ficha->FechaFin }}</p>
            <p><strong>Observaciones:</strong> {{ $ficha->Observaciones }}</p>
        </div>

        <div style="margin-top: 30px;">
            <a href="{{ route('Fichasdecaracterizacion.index') }}" style="background: #666; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Volver</a>
        </div>
    </div>
@endsection
