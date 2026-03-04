@extends('layouts.app')

@section('contenido')
    <div style="max-width: 600px; margin: 20px auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <h2 style="color: #39a900; border-bottom: 2px solid #39a900; padding-bottom: 10px;">Detalles del Programa</h2>

        <div style="margin-top: 20px; line-height: 2;">
            <p><strong>NIS:</strong> {{ $programa->NIS }}</p>
            <p><strong>Código del Programa:</strong> {{ $programa->Codigo }}</p>
            <p><strong>Denominación:</strong> {{ $programa->Denominacion }}</p>
            <p><strong>Observaciones:</strong></p>
            <div style="background: #f9f9f9; padding: 15px; border-radius: 5px; border-left: 4px solid #39a900;">
                {{ $programa->Observaciones ?: 'Sin observaciones registradas.' }}
            </div>
        </div>

        <div style="margin-top: 30px;">
            <a href="{{ route('programasdeformacion.index') }}" style="background: #666; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Volver a la lista</a>
            <a href="{{ route('programasdeformacion.edit', $programa->NIS) }}" style="background: #ffc107; color: black; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-left: 10px;">Editar Datos</a>
        </div>
    </div>
@endsection
