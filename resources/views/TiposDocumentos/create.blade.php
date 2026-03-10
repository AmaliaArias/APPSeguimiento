@extends('layouts.app')

@section('contenido')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0" style="border-radius: 15px;">
                    <div class="card-header bg-white border-0 pt-4">
                        <h2 class="fw-bold text-dark mb-0">Crear Nuevo Tipo de Documento</h2>
                        <div style="height: 4px; width: 50px; background-color: #39a900; margin-top: 10px;"></div>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('Tiposdocumentos.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold">Denominación:</label>
                                <input type="text" name="Denominacion" class="form-control border-2" required placeholder="Ej: Pasaporte">
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Observaciones:</label>
                                <textarea name="Observaciones" class="form-control border-2" rows="3" required placeholder="Notas adicionales..."></textarea>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success px-4 fw-bold" style="background-color: #39a900;">
                                    <i class="fas fa-save me-1"></i> Guardar Registro
                                </button>
                                <a href="{{ route('Tiposdocumentos.index') }}" class="btn btn-outline-secondary px-4">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
