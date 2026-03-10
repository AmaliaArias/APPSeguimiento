@extends('layouts.app')

@section('contenido')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                {{-- Tarjeta principal con el estilo unificado --}}
                <div class="card shadow-sm border-0" style="border-radius: 15px;">

                    <div class="card-header bg-white border-0 pt-4 px-4">
                        <h2 class="fw-bold text-success mb-0">
                            <i class="fas fa-edit me-2"></i>Editar EPS
                        </h2>
                        <hr style="border-top: 3px solid #39a900; width: 60px; opacity: 1;">
                        <p class="text-muted small mt-2">Modificando la entidad: <strong>{{ $eps->Denominacion }}</strong></p>
                    </div>

                    <form action="{{ route('Eps.update', $eps->NIS) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body p-4">

                            {{-- Bloque de Identificación --}}
                            <div class="mb-4">
                                <label class="text-secondary fw-bold small text-uppercase text-muted">Nombre de la EPS:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i class="fas fa-hospital text-muted"></i></span>
                                    <input type="text" name="Denominacion" class="form-control border-sena border-start-0"
                                           value="{{ $eps->Denominacion }}" required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                {{-- Número de Documento --}}
                                <div class="col-sm-12">
                                    <label class="text-secondary fw-bold small text-uppercase text-muted">Número de Documento (NIT):</label>
                                    <div class="p-3 bg-light rounded border-start border-4 border-info shadow-sm">
                                        <input type="number" name="Numdoc" class="form-control border-0 bg-transparent fw-bold"
                                               value="{{ $eps->Numdoc }}" required style="box-shadow: none; font-size: 1.1rem;">
                                    </div>
                                </div>
                            </div>

                            {{-- Observaciones --}}
                            <div class="mb-4">
                                <label class="text-secondary fw-bold small text-uppercase text-muted">Observaciones:</label>
                                <div class="p-2 bg-light rounded" style="border-left: 4px solid #ced4da;">
                                    <textarea name="Observaciones" class="form-control border-0 bg-transparent"
                                              rows="4" placeholder="Escriba detalles adicionales aquí...">{{ $eps->Observaciones }}</textarea>
                                </div>
                            </div>

                            {{-- Botones de Acción --}}
                            <div class="d-flex gap-2 border-top pt-4 mt-2">
                                <button type="submit" class="btn btn-sena px-5 fw-bold shadow-sm" style="border-radius: 8px;">
                                    <i class="fas fa-sync-alt me-1"></i> Actualizar Cambios
                                </button>
                                <a href="{{ route('Eps.index') }}" class="btn btn-outline-secondary px-4 fw-bold" style="border-radius: 8px;">
                                    Cancelar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .text-sena { color: #39a900; }
        .btn-sena { background-color: #39a900; color: white; border: none; transition: 0.3s; }
        .btn-sena:hover { background-color: #2d8500; color: white; transform: translateY(-2px); }
        .border-sena:focus { border-color: #39a900; box-shadow: 0 0 0 0.25rem rgba(57, 169, 0, 0.15); }
        .form-control:focus { outline: none !important; box-shadow: none; }
    </style>
@endsection
