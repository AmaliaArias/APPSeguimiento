@extends('layouts.app')

@section('contenido')
    <div class="card-custom shadow-sm p-4 bg-white rounded-4">
        {{-- Encabezado con Icono --}}
        <div class="d-flex align-items-center mb-4 border-bottom pb-3">
            <div class="bg-sena-light p-3 rounded-3 me-3">
                <i class="fas fa-plus-circle fa-2x text-sena"></i>
            </div>
            <div>
                <h1 class="fw-bold text-dark mb-0">Crear Nueva Ficha de Caracterización</h1>
                <p class="text-muted mb-0">Registra un nuevo grupo y asigna su programa e instructor</p>
            </div>
        </div>

        <form action="{{ route('Fichasdecaracterizacion.store') }}" method="POST">
            @csrf

            <div class="row g-4">
                {{-- Sección 1: Datos de Identificación --}}
                <div class="col-md-12">
                    <h5 class="text-sena fw-bold mb-3"><i class="fas fa-id-card me-2"></i>Información Básica</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Código de Ficha</label>
                            <input type="number" name="Codigo" class="form-control @error('Codigo') is-invalid @enderror" value="{{ old('Codigo') }}" required placeholder="Ej: 2503412">
                            @error('Codigo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-8 mb-3">
                            <label class="form-label fw-bold">Denominación</label>
                            <input type="text" name="Denominacion" class="form-control @error('Denominacion') is-invalid @enderror" value="{{ old('Denominacion') }}" required placeholder="Nombre del grupo ">
                            @error('Denominacion') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                {{-- Sección 2: Configuración Académica --}}
                <div class="col-md-12">
                    <h5 class="text-sena fw-bold mb-3"><i class="fas fa-university me-2"></i>Asignación Académica</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Centro de Formación</label>
                            <select name="tbl_centrosdeformacion_NIS" class="form-select border-sena" required>
                                <option value="">-- Seleccione un Centro --</option>
                                @foreach($centros as $centro)
                                    <option value="{{ $centro->NIS }}" {{ old('tbl_centrosdeformacion_NIS') == $centro->NIS ? 'selected' : '' }}>
                                        {{ $centro->Denominacion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Programa de Formación</label>
                            <select name="tbl_programasdeformacion_NIS" class="form-select border-sena" required>
                                <option value="">-- Seleccione un Programa --</option>
                                @foreach($programas as $programa)
                                    <option value="{{ $programa->NIS }}" {{ old('tbl_programasdeformacion_NIS') == $programa->NIS ? 'selected' : '' }}>
                                        {{ $programa->Denominacion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Sección 3: Instructor y Capacidad --}}
                <div class="col-md-12">
                    <h5 class="text-sena fw-bold mb-3"><i class="fas fa-user-tie me-2"></i>Responsable y Capacidad</h5>
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label class="form-label fw-bold">Instructor Encargado</label>
                            <select name="tbl_instructor_NIS" class="form-select @error('tbl_instructor_NIS') is-invalid @enderror">
                                <option value="">-- Seleccione un instructor --</option>
                                @foreach($instructores as $instructor)
                                    <option value="{{ $instructor->NIS }}" {{ old('tbl_instructor_NIS') == $instructor->NIS ? 'selected' : '' }}>
                                        {{ $instructor->Nombres }} {{ $instructor->Apellidos }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tbl_instructor_NIS') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Cupo de Aprendices</label>
                            <input type="number" name="Cupo" class="form-control" value="{{ old('Cupo') }}" required placeholder="Cant. aprendices">
                        </div>
                    </div>
                </div>

                {{-- Sección 4: Tiempos --}}
                <div class="col-md-12">
                    <h5 class="text-sena fw-bold mb-3"><i class="fas fa-calendar-alt me-2"></i>Cronograma</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Fecha de Inicio</label>
                            <input type="date" name="FechaInicio" class="form-control" value="{{ old('FechaInicio') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Fecha de Finalización</label>
                            <input type="date" name="FechaFin" class="form-control" value="{{ old('FechaFin') }}" required>
                        </div>
                    </div>
                </div>

                {{-- Sección 5: Observaciones --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold"><i class="fas fa-comment-dots me-2"></i>Observaciones</label>
                    <textarea name="Observaciones" class="form-control" rows="3" placeholder="Notas adicionales sobre la ficha...">{{ old('Observaciones') }}</textarea>
                </div>
            </div>

            {{-- Botonera --}}
            <div class="d-flex justify-content-end mt-4 pt-3 border-top">
                <a href="{{ route('Fichasdecaracterizacion.index') }}" class="btn btn-secondary px-4 me-2">
                    <i class="fas fa-times me-1"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-sena px-5 shadow-sm">
                    <i class="fas fa-save me-1"></i> Guardar Ficha
                </button>
            </div>
        </form>
    </div>

    <style>
        .text-sena { color: #39a900; }
        .btn-sena { background-color: #39a900; color: white; border: none; }
        .btn-sena:hover { background-color: #2d8500; color: white; }
        .bg-sena-light { background-color: rgba(57, 169, 0, 0.1); }
        .form-control:focus, .form-select:focus { border-color: #39a900; box-shadow: 0 0 0 0.25rem rgba(57, 169, 0, 0.25); }
        .border-sena { border-left: 4px solid #39a900; }
    </style>
@endsection
