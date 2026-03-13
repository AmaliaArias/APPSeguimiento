@extends('layouts.app')

@section('contenido')
    <div class="container mt-4">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-warning text-dark p-3 rounded-top-4">
                <h4 class="mb-0 text-center"><i class="fas fa-edit me-2"></i>Editar Bitácora #{{ $bitacora->numero_bitacora }}</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('Bitacoras.update', $bitacora->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- ¡Importante! Laravel necesita esto para editar --}}

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Número de Bitácora</label>
                            <input type="number" name="numero_bitacora" value="{{ $bitacora->numero_bitacora }}" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Fecha Inicio</label>
                            <input type="date" name="fechainicio" value="{{ $bitacora->fechainicio }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Actividades Realizadas</label>
                        <textarea name="descripcion_actividades" class="form-control" rows="4" required>{{ $bitacora->descripcion_actividades }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Evidencia Actual</label>
                        <p><small class="text-muted">Archivo: {{ $bitacora->evidencias }}</small></p>
                        <label class="form-label fw-bold">Cambiar PDF (Opcional)</label>
                        <input type="file" name="evidencias" class="form-control" accept=".pdf">
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('Bitacoras.index') }}" class="btn btn-secondary">Volver</a>
                        <button type="submit" class="btn btn-warning">Actualizar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
