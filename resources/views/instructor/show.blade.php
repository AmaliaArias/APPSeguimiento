@extends('layouts.app')

@section('contenido')
    <div style="max-width: 700px; margin: 20px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
        <h2 style="color: #39a900; border-bottom: 2px solid #39a900; padding-bottom: 10px;">Ficha del Instructor</h2>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <div style="margin-top: 20px; display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <p><strong>NIS:</strong> {{ $instructor->NIS }}</p>
            <p><strong>Documento:</strong> {{ $instructor->Numdoc }}
                ({{ $instructor->tipoDocumento->Denominacion ?? $tipoDoc->Denominacion ?? 'N/A' }})
            </p>
            <p><strong>Nombre:</strong> {{ $instructor->Nombres }} {{ $instructor->Apellidos }}</p>
            <p><strong>Rol:</strong> {{ $instructor->rol->Denominacion ?? $instructor->rol->descripcion ?? $rol->descripcion ?? 'No asignado' }}</p>
            <p><strong>Teléfono:</strong> {{ $instructor->Telefono ?? 'N/A' }}</p>
            <p><strong>Dirección:</strong> {{ $instructor->Direccion ?? 'N/A' }}</p>
            <p><strong>Fecha Nacimiento:</strong> {{ $instructor->FechaNac ? date('d/m/Y', strtotime($instructor->FechaNac)) : 'N/A' }}</p>
            <p><strong>Sexo:</strong> {{ $instructor->Sexo ?? 'N/A' }}</p>
            <p><strong>EPS:</strong> {{ $instructor->eps->Denominacion ?? 'N/A' }}</p>
        </div>

        <p><strong>Correo Institucional:</strong> {{ $instructor->CorreoInstitucional }}</p>
        @if($instructor->CorreoPersonal)
            <p><strong>Correo Personal:</strong> {{ $instructor->CorreoPersonal }}</p>
        @endif

        <div style="margin-top: 30px; display: flex; gap: 10px;">
            <a href="{{ route('instructor.edit', $instructor->NIS) }}" class="btn btn-warning" style="color: white;">Editar</a>
            <a href="{{ route('instructor.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
