@extends('layouts.app')

@section('contenido')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-sena text-white p-3 rounded-top-4">
                        <h4 class="mb-0"><i class="fas fa-file-upload me-2"></i>Registrar Nueva Bitácora</h4>
                    </div>
                    <div class="card-body p-4">
                        {{-- Mostramos errores de validación si existen --}}
                        @if ($errors->any())
                            <div class="alert alert-danger border-0 shadow-sm">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('Bitacoras.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-sena">Número de Bitácora</label>
                                    {{-- El valor viene automáticamente del controlador ($siguiente) --}}
                                    <input type="number" name="numero_bitacora" value="{{ $siguiente }}"
                                           class="form-control bg-light fw-bold" readonly title="Este número se asigna automáticamente">
                                    <small class="text-muted italic">Asignado por el sistema.</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Ficha de Caracterización</label>
                                    {{-- Puedes poner el número de ficha fijo si ya lo tienes --}}
                                    <input type="text" name="tbl_fichasdecaracterizacion_NIS" class="form-control"
                                           placeholder="Ej: 2554321" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Fecha Inicio del Periodo</label>
                                    <input type="date" name="fechainicio" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Fecha Fin del Periodo</label>
                                    <input type="date" name="fechafin" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Actividades Realizadas</label>
                                <textarea name="descripcion_actividades" class="form-control" rows="4"
                                          placeholder="Describe las tareas realizadas en estas dos semanas..." required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Archivo de Evidencia (PDF)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white"><i class="fas fa-file-pdf text-danger"></i></span>
                                    <input type="file" name="evidencia_file" class="form-control" accept=".pdf" required>
                                </div>
                                <div class="form-text small text-muted">Asegúrate de que el archivo esté firmado por tu jefe inmediato.</div>
                            </div>

                            {{-- NIS del Aprendiz oculto --}}
                            <input type="hidden" name="tbl_aprendiz_NIS" value="5">

                            <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                                <a href="{{ route('Bitacoras.index') }}" class="btn btn-outline-secondary px-4 border-0">
                                    <i class="fas fa-arrow-left me-1"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-sena px-5 text-white fw-bold shadow-sm">
                                    <i class="fas fa-paper-plane me-1"></i> Enviar Bitácora
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .bg-sena { background-color: #39a900; }
        .text-sena { color: #39a900; }
        .btn-sena { background-color: #39a900; border: none; }
        .btn-sena:hover { background-color: #2d8500; }
        .form-control:focus { border-color: #39a900; box-shadow: 0 0 0 0.25rem rgba(57, 169, 0, 0.25); }
    </style>
@endsection
