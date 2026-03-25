@extends('layouts.app')

@section('contenido')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    {{-- Encabezado con el color verde SENA --}}
                    <div class="bg-sena p-4 text-center text-white">
                        <i class="fas fa-user-check fa-4x mb-3"></i>
                        <h3 class="fw-bold mb-0">Instructor Asignado</h3>
                    </div>

                    <div class="card-body p-4 text-center">
                        {{-- Datos del Instructor --}}
                        <h4 class="text-dark fw-bold mb-1">
                            {{ $instructor->Nombres }} {{ $instructor->Apellidos }}
                        </h4>
                        <span class="badge bg-light text-success border border-success mb-3 px-3">Instructor de Seguimiento</span>

                        <hr class="my-4">

                        <div class="text-start px-3">
                            <div class="mb-3">
                                <label class="small text-muted d-block">Correo Institucional</label>
                                <span class="fw-bold"><i class="fas fa-envelope me-2 text-sena"></i>{{ $instructor->CorreoInstitucional }}</span>
                            </div>

                            <div class="mb-3">
                                <label class="small text-muted d-block">Número de Contacto</label>
                                <span class="fw-bold"><i class="fas fa-phone me-2 text-sena"></i>{{ $instructor->Telefono ?? 'No disponible' }}</span>
                            </div>

                            <div class="mb-3">
                                <label class="small text-muted d-block">Ubicación / Centro</label>
                                <span class="fw-bold"><i class="fas fa-map-marker-alt me-2 text-sena"></i>Centro de Logística y Promoción Ecoturística</span>
                            </div>
                        </div>

                        {{-- Botones de acción --}}
                        <div class="d-grid gap-2 mt-4">
                            <a href="mailto:{{ $instructor->CorreoInstitucional }}" class="btn btn-sena text-white fw-bold py-2">
                                <i class="fas fa-paper-plane me-2"></i>Enviar Correo
                            </a>
                            <a href="{{ route('aprendiz.dashboard') }}" class="btn btn-link text-muted text-decoration-none small">
                                Volver al Panel Principal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .bg-sena { background-color: #39a900; }
        .text-sena { color: #39a900; }
        .btn-sena { background-color: #39a900; border: none; }
        .btn-sena:hover { background-color: #2d8500; }
    </style>
@endsection
