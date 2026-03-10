@extends('layouts.app')

@section('contenido')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                {{-- Tarjeta principal con el estilo que te gusta --}}
                <div class="card shadow-sm border-0" style="border-radius: 15px;">

                    <div class="card-header bg-white border-0 pt-4 px-4">
                        <h2 class="fw-bold text-success mb-0">
                            <i class="fas fa-hospital-user me-2"></i>Detalle de la EPS
                        </h2>
                        <hr style="border-top: 3px solid #39a900; width: 60px; opacity: 1;">
                    </div>

                    <div class="card-body p-4">

                        {{-- Bloque de Identificación --}}
                        <div class="mb-4">
                            <label class="text-secondary fw-bold small text-uppercase text-muted">Nombre de la Entidad:</label>
                            <div class="p-3 bg-light rounded shadow-sm border">
                                <h5 class="mb-0 fw-bold text-dark">{{ $eps->Denominacion }}</h5>
                            </div>
                        </div>

                        <div class="row mb-4">
                            {{-- Número de Documento / NIT --}}
                            <div class="col-sm-6">
                                <label class="text-secondary fw-bold small text-uppercase text-muted">Número de Documento (NIT):</label>
                                <div class="p-2 bg-light rounded border-start border-4 border-info">
                                    <span class="text-dark fw-bold">{{ $eps->Numdoc }}</span>
                                </div>
                            </div>
                            {{-- NIS --}}
                            <div class="col-sm-6">
                                <label class="text-secondary fw-bold small text-uppercase text-muted">ID Sistema (NIS):</label>
                                <div class="p-2 bg-light rounded border-start border-4 border-success">
                                    <span class="text-success fw-bold">{{ $eps->NIS }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Observaciones --}}
                        <div class="mb-4">
                            <label class="text-secondary fw-bold small text-uppercase text-muted">Observaciones:</label>
                            <div class="p-3 bg-light rounded" style="min-height: 100px; border-left: 4px solid #ced4da;">
                                <p class="mb-0 text-muted italic">
                                    {{ $eps->Observaciones ?: 'No hay observaciones registradas para esta EPS.' }}
                                </p>
                            </div>
                        </div>

                        {{-- Botones de Navegación --}}
                        <div class="d-flex gap-2 border-top pt-4">
                            <a href="{{ route('Eps.index') }}" class="btn btn-secondary px-4 fw-bold shadow-sm" style="border-radius: 8px;">
                                <i class="fas fa-arrow-left me-1"></i> Volver a la lista
                            </a>
                            <a href="{{ route('Eps.edit', $eps->NIS) }}" class="btn btn-warning px-4 fw-bold shadow-sm" style="border-radius: 8px;">
                                <i class="fas fa-edit me-1"></i> Editar EPS
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .italic { font-style: italic; }
        .text-muted { color: #6c757d !important; }
    </style>
@endsection
