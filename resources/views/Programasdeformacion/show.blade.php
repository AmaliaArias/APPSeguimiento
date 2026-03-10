@extends('layouts.app')

@section('contenido')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                {{-- Tarjeta blanca con sombra (Card) --}}
                <div class="card shadow-sm border-0" style="border-radius: 15px;">

                    {{-- Encabezado con línea institucional --}}
                    <div class="card-header bg-white border-0 pt-4 px-4">
                        <h2 class="fw-bold text-success mb-0">
                            <i class="fas fa-info-circle me-2"></i>Detalles del Programa
                        </h2>
                        <hr style="border-top: 3px solid #39a900; width: 60px; opacity: 1;">
                    </div>

                    <div class="card-body p-4">
                        {{-- Fila para NIS y Código --}}
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <label class="text-secondary fw-bold small uppercase">NIS:</label>
                                <div class="p-2 bg-light rounded border-start border-4 border-success">
                                    <span class="fw-bold text-dark">{{ $programa->NIS }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="text-secondary fw-bold small uppercase">Código del Programa:</label>
                                <div class="p-2 bg-light rounded">
                                    <span class="text-dark">{{ $programa->Codigo }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Denominación --}}
                        <div class="mb-4">
                            <label class="text-secondary fw-bold small uppercase">Denominación:</label>
                            <div class="p-3 bg-light rounded shadow-sm border">
                                <h5 class="mb-0 fw-bold text-dark">{{ $programa->Denominacion }}</h5>
                            </div>
                        </div>

                        {{-- Observaciones --}}
                        <div class="mb-4">
                            <label class="text-secondary fw-bold small uppercase">Observaciones:</label>
                            <div class="p-3 bg-light rounded" style="min-height: 100px; border-left: 4px solid #ced4da;">
                                <p class="mb-0 text-muted">
                                    {{ $programa->Observaciones ?: 'Sin observaciones registradas.' }}
                                </p>
                            </div>
                        </div>

                        {{-- Botones de Acción (Mismo estilo que Roles Admin) --}}
                        <div class="d-flex gap-2 border-top pt-4">
                            <a href="{{ route('programasdeformacion.index') }}" class="btn btn-secondary px-4 fw-bold shadow-sm" style="border-radius: 8px;">
                                <i class="fas fa-arrow-left me-1"></i> Volver a la lista
                            </a>
                            <a href="{{ route('programasdeformacion.edit', $programa->NIS) }}" class="btn btn-warning px-4 fw-bold shadow-sm" style="border-radius: 8px;">
                                <i class="fas fa-edit me-1"></i> Editar Datos
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
