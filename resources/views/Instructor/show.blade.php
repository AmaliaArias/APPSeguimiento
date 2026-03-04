@extends('layouts.app')

@section('contenido')
    <div style="max-width: 700px; margin: 20px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
        <h2 style="color: #39a900; border-bottom: 2px solid #39a900; padding-bottom: 10px;">Ficha del Instructor</h2>

        <div style="margin-top: 20px; display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <p><strong>NIS:</strong> {{ $instructor->NIS }}</p>
            <p><strong>Documento:</strong> {{ $instructor->Numdoc }} ({{ $tipoDoc->Denominacion ?? 'N/A' }})</p>
            <p><strong>Nombre:</strong> {{ $instructor->Nombres }} {{ $instructor->Apellidos }}</p>
            <p><strong>Rol:</strong> {{ $rol->descripcion ?? 'No asignado' }}</p>
            <p><strong>Teléfono:</strong> {{ $instructor->Telefono }}</p>
            <p><strong>Dirección:</strong> {{ $instructor->Direccion }}</p>
        </div>

        <p><strong>Correo:</strong> {{ $instructor->CorreoInstitucional }}</p>

        <div style="margin-top: 30px;">
            <a href="{{ route('Instructor.index') }}" style="background: #666; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Volver</a>
        </div>
    </div>
@endsection
