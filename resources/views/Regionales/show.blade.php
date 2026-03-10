@extends('layouts.app')

@section('contenido')
    <div class="container py-4">
        <div class="card-custom shadow-sm bg-white rounded-4 overflow-hidden border-0" style="max-width: 750px; margin: auto;">

            {{-- Encabezado con Identidad Institucional --}}
            <div class="p-4 bg-light border-bottom d-flex justify-content-between align-items-center">
                <div>
                    <span class="badge bg-sena mb-2 text-white px-3 text-uppercase">Información de Sede</span>
                    <h2 class="fw-bold text-dark mb-0">{{ $regional->Denominacion }}</h2>
                    <small class="text-muted">Código de Regional: <span class="fw-bold">{{ $regional->Codigo }}</span></small>
                </div>
                <div class="text-sena">
                    <i class="fas fa-map-marked-alt fa-3x"></i>
                </div>
            </div>

            <div class="card-body p-4">
                <div class="row g-4">

                    {{-- Datos de Identificación --}}
                    <div class="col-md-5">
                        <div class="p-3 border rounded-3 bg-light-subtle h-100">
                            <h6 class="text-muted small text-uppercase fw-bold mb-3 border-bottom pb-2">Sistema</h6>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-3">
                                    <small class="text-muted d-block">NIS (ID Interno):</small>
                                    <span class="fw-bold text-dark" style="font-size: 1.1rem;">{{ $regional->NIS }}</span>
                                </li>
                                <li>
                                    <small class="text-muted d-block">Código Regional:</small>
                                    <span class="fw-bold text-dark" style="font-size: 1.1rem;">{{ $regional->Codigo }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Observaciones --}}
                    <div class="col-md-7">
                        <div class="p-3 border rounded-3 bg-light-subtle h-100">
                            <h6 class="text-muted small text-uppercase fw-bold mb-3 border-bottom pb-2">Descripción y Notas</h6>
                            <div class="p-3 bg-white rounded-2 border-start border-4 border-success shadow-sm">
                                <p class="mb-0 text-dark italic">
                                    {{ $regional->Observaciones ?: 'No hay observaciones registradas para esta regional.' }}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Pie de tarjeta con botones estilizados --}}
            <div class="card-footer p-4 bg-white border-top d-flex justify-content-between align-items-center">
                <a href="{{ route('Regionales.index') }}" class="btn btn-outline-secondary px-4 shadow-sm">
                    <i class="fas fa-arrow-left me-1"></i> Volver a la lista
                </a>
                <div>
                    <a href="{{ route('Regionales.edit', $regional->NIS) }}" class="btn btn-warning px-4 text-dark fw-bold shadow-sm">
                        <i class="fas fa-edit me-1"></i> Editar Regional
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .text-sena { color: #39a900; }
        .bg-sena { background-color: #39a900; }
        .bg-light-subtle { background-color: #f8f9fa; }
        .card-custom { border-radius: 1.2rem; }

        /* Efecto de cursiva para observaciones */
        .italic { font-style: italic; color: #555; }
    </style>
@endsection
