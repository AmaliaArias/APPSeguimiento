@extends('layouts.app')

@section('contenido')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-9">
                {{-- Tarjeta principal --}}
                <div class="card shadow-sm border-0" style="border-radius: 15px;">

                    <div class="card-header bg-white border-0 pt-4 px-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="fw-bold text-success mb-0">
                                    <i class="fas fa-user-graduate me-2"></i>Ficha Técnica del Aprendiz
                                </h2>
                                <hr style="border-top: 3px solid #39a900; width: 60px; opacity: 1;">
                            </div>
                            <span class="badge bg-success px-3 py-2 rounded-pill">Estado: Activo</span>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="row g-4">

                            {{-- Bloque 1: Identificación (Borde Azul) --}}
                            <div class="col-md-6">
                                <label class="text-secondary fw-bold small text-uppercase text-muted mb-2">Datos de Identificación:</label>
                                <div class="p-3 bg-light rounded border-start border-4 border-info shadow-sm h-100">
                                    <p class="mb-2"><strong>Nombres:</strong> <span class="text-dark">{{ $aprendiz->Nombres }}</span></p>
                                    <p class="mb-2"><strong>Apellidos:</strong> <span class="text-dark">{{ $aprendiz->Apellidos }}</span></p>
                                    <p class="mb-2"><strong>Tipo Doc:</strong> <span class="text-dark">{{ $aprendiz->tipoDocumento->Denominacion ?? 'N/A' }}</span></p>
                                    <p class="mb-2"><strong>Número:</strong> <span class="fw-bold text-primary">{{ $aprendiz->Numdoc }}</span></p>
                                    <p class="mb-2"><strong>Sexo:</strong>
                                        <span class="badge {{ $aprendiz->Sexo == 1 ? 'bg-primary' : 'bg-danger' }} bg-opacity-10 {{ $aprendiz->Sexo == 1 ? 'text-primary' : 'text-danger' }}">
                                            {{ $aprendiz->Sexo == 1 ? 'Masculino' : 'Femenino' }}
                                        </span>
                                    </p>
                                    <p class="mb-0"><strong>F. Nacimiento:</strong> <span class="text-dark">{{ $aprendiz->FechaNac }}</span></p>
                                </div>
                            </div>

                            {{-- Bloque 2: Vinculación Institucional (Borde Naranja) --}}
                            <div class="col-md-6">
                                <label class="text-secondary fw-bold small text-uppercase text-muted mb-2">Vinculación y Salud:</label>
                                <div class="p-3 bg-light rounded border-start border-4 border-warning shadow-sm h-100">
                                    <p class="mb-3">
                                        <strong class="d-block text-muted small text-uppercase">Ficha de Caracterización:</strong>
                                        <span class="fw-bold text-dark" style="font-size: 1.1rem;">
                                            <i class="fas fa-users text-warning me-1"></i>
                                            {{ $aprendiz->ficha->Codigo ?? 'Sin asignar' }}
                                        </span>
                                        <br>
                                        <small class="text-muted">{{ $aprendiz->ficha->Denominacion ?? '' }}</small>
                                    </p>
                                    <p class="mb-0">
                                        <strong class="d-block text-muted small text-uppercase">Entidad de Salud (EPS):</strong>
                                        <span class="text-dark fw-bold">
                                            <i class="fas fa-heartbeat text-danger me-1"></i>
                                            {{ $aprendiz->eps->Denominacion ?? 'No registrada' }}
                                        </span>
                                    </p>
                                </div>
                            </div>

                            {{-- Bloque 3: Contacto (Borde Verde) --}}
                            <div class="col-12">
                                <label class="text-secondary fw-bold small text-uppercase text-muted mb-2">Contacto y Ubicación:</label>
                                <div class="p-3 bg-light rounded border-start border-4 border-success shadow-sm">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="mb-0"><strong>Dirección:</strong> <br><span class="text-dark">{{ $aprendiz->Direccion }}</span></p>
                                        </div>
                                        <div class="col-md-4 border-start">
                                            <p class="mb-0"><strong>Teléfono:</strong> <br><span class="text-dark">{{ $aprendiz->Telefono }}</span></p>
                                        </div>
                                        <div class="col-md-4 border-start">
                                            <p class="mb-1"><strong>Correos:</strong></p>
                                            <a href="mailto:{{ $aprendiz->CorreoInstitucional }}" class="d-block text-decoration-none fw-bold text-success small mb-1">
                                                <i class="fas fa-university me-1"></i>{{ $aprendiz->CorreoInstitucional }}
                                            </a>
                                            <span class="small text-muted d-block">
                                                <i class="fas fa-envelope me-1"></i>{{ $aprendiz->CorreoPersonal }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Bloque 4: Sistema (Borde Gris) --}}
                            <div class="col-12">
                                <div class="p-3 rounded d-flex align-items-center shadow-sm" style="background: #f8f9fa; border-left: 4px solid #ced4da;">
                                    <i class="fas fa-database text-muted me-3 fa-2x"></i>
                                    <div>
                                        <span class="d-block text-secondary small fw-bold">NIS DE REGISTRO (ID SISTEMA)</span>
                                        <span class="fw-bold text-dark">{{ $aprendiz->NIS }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Botones de Navegación --}}
                        <div class="d-flex gap-2 border-top pt-4 mt-4">
                            <a href="{{ route('Aprendiz.index') }}" class="btn btn-secondary px-4 fw-bold shadow-sm" style="border-radius: 8px;">
                                <i class="fas fa-arrow-left me-1"></i> Volver a la Lista
                            </a>
                            <a href="{{ route('Aprendiz.edit', $aprendiz->NIS) }}" class="btn btn-warning px-4 fw-bold shadow-sm" style="border-radius: 8px;">
                                <i class="fas fa-edit me-1"></i> Editar Aprendiz
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
