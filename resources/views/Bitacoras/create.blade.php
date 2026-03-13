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
                        <form action="{{ route('Bitacoras.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Número de Bitácora</label>
                                    <input type="number" name="numero_bitacora" class="form-control" placeholder="Ej: 1" required min="1" max="12">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Ficha de Caracterización</label>
                                    <input type="text" name="tbl_fichasdecaracterizacion_NIS" class="form-control" placeholder="Código de la ficha" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Fecha Inicio</label>
                                    <input type="date" name="fechainicio" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Fecha Fin</label>
                                    <input type="date" name="fechafin" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Actividades Realizadas</label>
                                <textarea name="descripcion_actividades" class="form-control" rows="4" placeholder="Describe brevemente las tareas que realizaste en el periodo..." required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Evidencia (Solo PDF)</label>
                                <input type="file" name="evidencia_file" class="form-control" accept=".pdf" required>
                                <div class="form-text">Carga el formato de bitácora firmado por tu jefe inmediato.</div>
                            </div>

                            {{-- Campo oculto para el aprendiz (luego lo haremos automático) --}}
                            <input type="hidden" name="tbl_aprendiz_NIS" value="5">

                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <a href="{{ route('Bitacoras.index') }}" class="btn btn-outline-secondary px-4">Cancelar</a>
                                <button type="submit" class="btn btn-sena px-4 text-white font-weight-bold">Enviar Bitácora</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .bg-sena { background-color: #39a900; }
        .btn-sena { background-color: #39a900; border: none; }
        .btn-sena:hover { background-color: #2d8500; }
    </style>
@endsection
