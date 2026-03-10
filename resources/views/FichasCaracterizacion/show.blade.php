@extends('layouts.app')

@section('contenido')
    <div class="card-custom shadow-sm p-4 bg-white rounded-4">
        {{-- Encabezado con Icono --}}
        <div class="d-flex align-items-center mb-4 border-bottom pb-3">
            <div class="bg-sena-light p-3 rounded-3 me-3">
                <i class="fas fa-file-invoice fa-2x text-sena"></i>
            </div>
            <div>
                <h1 class="fw-bold text-dark mb-0">Detalle de la Ficha: <span class="text-sena">{{ $ficha->Codigo }}</span></h1>
                <p class="text-muted mb-0">Información completa del grupo de formación</p>
            </div>
        </div>

        <div class="row g-4">
            {{-- Sección 1: Información Principal --}}
            <div class="col-md-6">
                <div class="p-3 border rounded-3 h-100 shadow-sm">
                    <h5 class="text-sena fw-bold mb-3"><i class="fas fa-info-circle me-2"></i>Datos Generales</h5>
                    <ul class="list-group list-group-flush">

                                {{-- Dentro de la Sección 2: Programa y Centro --}}
                     <li class="list-group-item">
                     <span class="text-muted d-block small text-uppercase">Instructor Encargado:</span>
                     <span class="fw-bold text-sena">
                    <i class="fas fa-user-chalkboard me-1"></i>
                     {{ $ficha->instructor->Nombres ?? 'No asignado' }} {{ $ficha->instructor->Apellidos ?? '' }}
                     </span>
                        </li>


                        <li class="list-group-item d-flex justify-content-between">
                            <span class="text-muted font-weight-bold">Código de Ficha:</span>
                            <span class="fw-bold">{{ $ficha->Codigo }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="text-muted">Denominación:</span>
                            <span class="text-end fw-bold" style="max-width: 60%;">{{ $ficha->Denominacion }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="text-muted">Cupo Total:</span>
                            <span class="badge bg-sena text-white rounded-pill px-3">{{ $ficha->Cupo }} aprendices</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Sección 2: Programa y Centro --}}
            <div class="col-md-6">
                <div class="p-3 border rounded-3 h-100 shadow-sm">
                    <h5 class="text-sena fw-bold mb-3"><i class="fas fa-university me-2"></i>Ubicación Académica</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <span class="text-muted d-block small text-uppercase">Programa de Formación:</span>
                            <span class="fw-bold">{{ $ficha->programa->Denominacion ?? 'No asignado' }}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="text-muted d-block small text-uppercase">Centro de Formación:</span>
                            <span class="fw-bold">{{ $ficha->centro->Denominacion ?? 'No asignado' }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Sección 3: Cronograma --}}
            <div class="col-md-12">
                <div class="p-3 border rounded-3 shadow-sm bg-light">
                    <h5 class="text-sena fw-bold mb-3"><i class="fas fa-calendar-alt me-2"></i>Cronograma de Formación</h5>
                    <div class="row text-center">
                        <div class="col-md-6 border-end">
                            <span class="text-muted d-block">Fecha de Inicio</span>
                            <span class="h5 fw-bold text-dark">{{ $ficha->FechaInicio }}</span>
                        </div>
                        <div class="col-md-6">
                            <span class="text-muted d-block">Fecha de Finalización</span>
                            <span class="h5 fw-bold text-danger">{{ $ficha->FechaFin }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sección 4: Observaciones --}}
            <div class="col-md-12">
                <div class="p-3 border rounded-3 shadow-sm">
                    <h5 class="text-sena fw-bold mb-3"><i class="fas fa-comment-dots me-2"></i>Observaciones del Registro</h5>
                    <div class="p-3 bg-white border rounded">
                        {{ $ficha->Observaciones ?: 'Sin observaciones registradas.' }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Botonera --}}
        <div class="d-flex justify-content-end mt-4 pt-3 border-top">
            <a href="{{ route('Fichasdecaracterizacion.index') }}" class="btn btn-secondary px-4 me-2">
                <i class="fas fa-arrow-left me-1"></i> Volver a la Lista
            </a>
            <a href="{{ route('Fichasdecaracterizacion.edit', $ficha->NIS) }}" class="btn btn-warning px-4">
                <i class="fas fa-edit me-1"></i> Editar Ficha
            </a>
        </div>
    </div>

    <style>
        .text-sena { color: #39a900; }
        .bg-sena { background-color: #39a900; }
        .bg-sena-light { background-color: rgba(57, 169, 0, 0.1); }
        .list-group-item { border-left: none; border-right: none; padding: 0.75rem 0; }
        .list-group-item:last-child { border-bottom: none; }
    </style>
@endsection
