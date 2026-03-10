@extends('layouts.app')

@section('contenido')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                {{-- Tarjeta principal con el estilo unificado --}}
                <div class="card shadow-sm border-0" style="border-radius: 15px;">

                    <div class="card-header bg-white border-0 pt-4 px-4">
                        <h2 class="fw-bold text-success mb-0">
                            <i class="fas fa-info-circle me-2"></i>Detalle del Centro
                        </h2>
                        <hr style="border-top: 3px solid #39a900; width: 60px; opacity: 1;">
                    </div>

                    <div class="card-body p-4">
                        {{-- Bloque de Identificación --}}
                        <div class="mb-4">
                            <label class="text-secondary fw-bold small uppercase text-muted">Código y Denominación:</label>
                            <div class="p-3 bg-light rounded shadow-sm border">
                                <h5 class="mb-0 fw-bold text-dark">{{ $centro->Codigo }} - {{ $centro->Denominacion }}</h5>
                            </div>
                        </div>

                        <div class="row mb-4">
                            {{-- Dirección --}}
                            <div class="col-sm-6">
                                <label class="text-secondary fw-bold small uppercase text-muted">Dirección:</label>
                                <div class="p-2 bg-light rounded border-start border-4 border-info">
                                    <span class="text-dark">{{ $centro->Direccion }}</span>
                                </div>
                            </div>
                            {{-- Regional --}}
                            <div class="col-sm-6">
                                <label class="text-secondary fw-bold small uppercase text-muted">Regional:</label>
                                <div class="p-2 bg-light rounded border-start border-4 border-success">
                                    <span class="text-success fw-bold">{{ $centro->regional->Denominacion ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- NUEVO: Bloque de Ficha de Caracterización --}}
                        <div class="mb-4">
                            <label class="text-secondary fw-bold small uppercase text-muted">Ficha Asociada:</label>
                            <div class="p-3 bg-white border rounded d-flex align-items-center" style="border-left: 4px solid #39a900 !important;">
                                <i class="fas fa-id-card fa-2x text-muted me-3"></i>
                                <div>
                                    @if($centro->ficha)
                                        <span class="d-block fw-bold text-dark">Código: {{ $centro->ficha->Codigo }}</span>
                                        <span class="small text-muted">{{ $centro->ficha->Denominacion }}</span>
                                    @else
                                        <span class="text-muted italic">No hay una ficha vinculada a este centro.</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Observaciones --}}
                        <div class="mb-4">
                            <label class="text-secondary fw-bold small uppercase text-muted">Observaciones:</label>
                            <div class="p-3 bg-light rounded" style="min-height: 80px; border-left: 4px solid #ced4da;">
                                <p class="mb-0 text-muted italic">
                                    {{ $centro->Observaciones ?: 'Sin observaciones registradas.' }}
                                </p>
                            </div>
                        </div>

                        {{-- Botones de Navegación --}}
                        <div class="d-flex gap-2 border-top pt-4">
                            <a href="{{ route('Centrosdeformacion.index') }}" class="btn btn-secondary px-4 fw-bold shadow-sm" style="border-radius: 8px;">
                                <i class="fas fa-arrow-left me-1"></i> Volver a la lista
                            </a>
                            <a href="{{ route('Centrosdeformacion.edit', $centro->NIS) }}" class="btn btn-warning px-4 fw-bold shadow-sm" style="border-radius: 8px;">
                                <i class="fas fa-edit me-1"></i> Editar Datos
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
