@extends('layouts.app')

@section('contenido')
    <div class="card-custom shadow-sm p-4 bg-white rounded-4">
        {{-- Encabezado con Icono --}}
        <div class="d-flex align-items-center mb-4 border-bottom pb-3">
            <div class="bg-warning-light p-3 rounded-3 me-3">
                <i class="fas fa-edit fa-2x text-warning"></i>
            </div>
            <div>
                <h1 class="fw-bold text-dark mb-0">Editar Ficha: <span class="text-sena">{{ $ficha->Codigo }}</span></h1>
                <p class="text-muted mb-0">Modifica la información necesaria del grupo de formación</p>
            </div>
        </div>

        <form action="{{ route('Fichasdecaracterizacion.update', $ficha->NIS) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-4">
                {{-- Sección 1: Datos de Identificación --}}
                <div class="col-md-12">
                    <h5 class="text-sena fw-bold mb-3"><i class="fas fa-id-card me-2"></i>Información Básica</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Código de Ficha</label>
                            <input type="number" name="Codigo" value="{{ $ficha->Codigo }}" class="form-control" required>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label class="form-label fw-bold">Denominación</label>
                            <input type="text" name="Denominacion" value="{{ $ficha->Denominacion }}" class="form-control" required>
                        </div>
                    </div>
                </div>

                {{-- Sección 2: Configuración Académica --}}
                <div class="col-md-12">
                    <h5 class="text-sena fw-bold mb-3"><i class="fas fa-university me-2"></i>Asignación Académica</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Centro de Formación</label>
                            <select name="tbl_centrosdeformacion_NIS" class="form-select border-sena">
                                @foreach($centros as $c)
                                    <option value="{{ $c->NIS }}" {{ $ficha->tbl_centrosdeformacion_NIS == $c->NIS ? 'selected' : '' }}>
                                        {{ $c->Denominacion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Programa de Formación</label>
                            <select name="tbl_programasdeformacion_NIS" class="form-select border-sena">
                                @foreach($programas as $p)
                                    <option value="{{ $p->NIS }}" {{ $ficha->tbl_programasdeformacion_NIS == $p->NIS ? 'selected' : '' }}>
                                        {{ $p->Denominacion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- En edit.blade.php, dentro de la Sección 2 o 3 --}}
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Instructor Responsable</label>
                            <select name="tbl_instructor_NIS" class="form-select border-sena">
                                <option value="">-- Seleccione un instructor --</option>
                                @foreach($instructor as $ins)
                                    <option value="{{ $ins->NIS }}" {{ $ficha->tbl_instructor_NIS == $ins->NIS ? 'selected' : '' }}>
                                        {{ $ins->Nombres }} {{ $ins->Apellidos }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                </div>

                {{-- Sección 3: Tiempos y Cupo --}}
                <div class="col-md-12">
                    <h5 class="text-sena fw-bold mb-3"><i class="fas fa-calendar-alt me-2"></i>Cronograma y Capacidad</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Cupo de Aprendices</label>
                            <input type="number" name="Cupo" value="{{ $ficha->Cupo }}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Fecha de Inicio</label>
                            <input type="date" name="FechaInicio" value="{{ $ficha->FechaInicio }}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Fecha de Finalización</label>
                            <input type="date" name="FechaFin" value="{{ $ficha->FechaFin }}" class="form-control text-danger fw-bold">
                        </div>
                    </div>
                </div>

                {{-- Sección 4: Observaciones --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold"><i class="fas fa-comment-dots me-2"></i>Observaciones Adicionales</label>
                    <textarea name="Observaciones" class="form-control" rows="3" placeholder="Añade notas importantes aquí...">{{ $ficha->Observaciones }}</textarea>
                </div>
            </div>

            {{-- Botonera --}}
            <div class="d-flex justify-content-end mt-4 pt-3 border-top">
                <a href="{{ route('Fichasdecaracterizacion.index') }}" class="btn btn-secondary px-4 me-2">
                    <i class="fas fa-times me-1"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-sena px-5 shadow-sm">
                    <i class="fas fa-save me-1"></i> Actualizar Ficha
                </button>
            </div>
        </form>
    </div>

    <style>
        .text-sena { color: #39a900; }
        .btn-sena { background-color: #39a900; color: white; border: none; }
        .btn-sena:hover { background-color: #2d8500; color: white; }
        .bg-warning-light { background-color: rgba(255, 193, 7, 0.15); }
        .form-control:focus, .form-select:focus { border-color: #39a900; box-shadow: 0 0 0 0.25rem rgba(57, 169, 0, 0.25); }
        .border-sena { border-left: 4px solid #39a900; }
    </style>
@endsection
