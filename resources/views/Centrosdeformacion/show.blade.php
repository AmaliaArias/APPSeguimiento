@extends('layouts.app')

@section('contenido')
    <div style="max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
        <h2 style="color: #39a900;">Detalle del Centro: {{ $centro->Codigo }}</h2>
        <p><strong>Denominación:</strong> {{ $centro->Denominacion }}</p>
        <p><strong>Dirección:</strong> {{ $centro->Direccion }}</p>
        <p><strong>Regional:</strong> {{ $centro->regional->Denominacion ?? 'N/A' }}</p>
        <p><strong>Observaciones:</strong> {{ $centro->Observaciones }}</p>
        <a href="{{ route('Centrosdeformacion.index') }}" style="color: blue;">Volver a la lista</a>
    </div>
@endsection
