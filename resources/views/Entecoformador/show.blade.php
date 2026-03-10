@extends('layouts.app')

@section('contenido')
    <div class="container py-4">
        <div class="card-custom shadow-sm bg-white rounded-4 overflow-hidden border-0" style="max-width: 800px; margin: auto;">

            {{-- Encabezado con Identidad Visual --}}
            <div class="p-4 bg-light border-bottom d-flex justify-content-between align-items-center">
                <div>
                    <span class="badge bg-sena mb-2 text-white px-3">Ente Coformador</span>
                    <h2 class="fw-bold text-dark mb-0">{{ $entes->RazonSocial }}</h2>
                </div>
                <i class="fas fa-building fa-3x text-light"></i>
            </div>

            <div class="card-body p-4">
                <div class="row g-4">

                    {{-- Sección 1: Datos Legales --}}
                    <div class="col-md-6">
                        <div class="p-3 border rounded-3 bg-light-subtle">
                            <h6 class="text-muted small text-uppercase fw-bold mb-3 border-bottom pb-2">Identificación Legal</h6>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2">
                                    <small class="text-muted d-block">NIS (ID Interno):</small>
                                    <span class="fw-bold text-dark">{{ $entes->NIS }}</span>
                                </li>
                                <li class="mb-2">
                                    <small class="text-muted d-block">Tipo de Documento:</small>
                                    <span class="fw-bold text-dark">{{ $entes->Tdoc }}</span>
                                </li>
                                <li>
                                    <small class="text-muted d-block">Número de Documento (NIT):</small>
                                    <span class="fw-bold text-dark">{{ $entes->Numdoc }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Sección 2: Información de Contacto --}}
                    <div class="col-md-6">
                        <div class="p-3 border rounded-3 bg-light-subtle">
                            <h6 class="text-muted small text-uppercase fw-bold mb-3 border-bottom pb-2">Ubicación y Contacto</h6>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2">
                                    <small class="text-muted d-block"><i class="fas fa-map-marker-alt me-1"></i> Dirección:</small>
                                    <span class="fw-bold text-dark">{{ $entes->Direccion ?? 'No registrada' }}</span>
                                </li>
                                <li class="mb-2">
                                    <small class="text-muted d-block"><i class="fas fa-phone me-1"></i> Teléfono:</small>
                                    <span class="fw-bold text-dark">{{ $entes->Telefono ?? 'No registrado' }}</span>
                                </li>
                                <li>
                                    <small class="text-muted d-block"><i class="fas fa-envelope me-1"></i> Correo Electrónico:</small>
                                    <a href="mailto:{{ $entes->CorreoInstitucional }}" class="text-decoration-none fw-bold text-sena">
                                        {{ $entes->CorreoInstitucional }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Pie de tarjeta con acciones rápidas --}}
            <div class="card-footer p-4 bg-white border-top d-flex justify-content-between align-items-center">
                <a href="{{ route('Entecoformador.index') }}" class="btn btn-outline-secondary px-4">
                    <i class="fas fa-arrow-left me-1"></i> Volver a la lista
                </a>
                <div>
                    <a href="{{ route('Entecoformador.edit', $entes->NIS) }}" class="btn btn-warning px-4 text-dark shadow-sm">
                        <i class="fas fa-edit me-1"></i> Editar Datos
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .text-sena { color: #39a900; }
        .bg-sena { background-color: #39a900; }
        .bg-light-subtle { background-color: #f8f9fa; }
        .card-custom { border-radius: 1rem; }

        /* Pequeño ajuste para que los textos no se vean muy apretados */
        .list-unstyled li span {
            font-size: 1.05rem;
        }
    </style>
@endsection
