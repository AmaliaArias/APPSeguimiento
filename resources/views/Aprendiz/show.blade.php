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
                            <span class="badge bg-success px-3 py-2 rounded-pill">Estado: Vinculado</span>
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
                                    <p class="mb-2"><strong>Tipo Doc:</strong> <span class="text-dark">{{ $tipoDoc->Denominacion ?? 'N/A' }}</span></p>
                                    <p class="mb-2"><strong>Número:</strong> <span class="fw-bold text-primary">{{ $aprendiz->Numdoc }}</span></p>
                                    <p class="mb-2"><strong>Sexo:</strong>
                                        <span class="badge {{ $aprendiz->Sexo == 'M' ? 'bg-primary' : 'bg-danger' }} bg-opacity-10 {{ $aprendiz->Sexo == 'M' ? 'text-primary' : 'text-danger' }}">
                                            {{ $aprendiz->Sexo == 'M' ? 'Masculino' : 'Femenino' }}
                                        </span>
                                    </p>
                                    <p class="mb-0"><strong>F. Nacimiento:</strong> <span class="text-dark">{{ $aprendiz->FechaNac }}</span></p>
                                </div>
                            </div>

                            {{-- Bloque 2: Contacto (Borde Verde) --}}
                            <div class="col-md-6">
                                <label class="text-secondary fw-bold small text-uppercase text-muted mb-2">Contacto y Ubicación:</label>
                                <div class="p-3 bg-light rounded border-start border-4 border-success shadow-sm h-100">
                                    <p class="mb-2"><strong>Dirección:</strong> <br><span class="text-dark">{{ $aprendiz->Direccion }}</span></p>
                                    <p class="mb-2"><strong>Teléfono:</strong> <br><span class="text-dark">{{ $aprendiz->Telefono }}</span></p>
                                    <p class="mb-2">
                                        <strong>Correo Institucional:</strong><br>
                                        <a href="mailto:{{ $aprendiz->CorreoInstitucional }}" class="text-decoration-none fw-bold text-success small">
                                            {{ $aprendiz->CorreoInstitucional }}
                                        </a>
                                    </p>
                                    <p class="mb-0">
                                        <strong>Correo Personal:</strong><br>
                                        <span class="small text-muted">{{ $aprendiz->CorreoPersonal }}</span>
                                    </p>
                                </div>
                            </div>

                            {{-- Bloque 3: Sistema (Borde Gris) --}}
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
