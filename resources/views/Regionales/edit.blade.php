@extends('layouts.app')

@section('contenido')
    <div class="container py-4">
        <div class="card-custom shadow-sm bg-white rounded-4 overflow-hidden border-0" style="max-width: 700px; margin: auto;">

            {{-- Encabezado con estilo de edición --}}
            <div class="p-4 border-bottom bg-light">
                <h3 class="fw-bold text-dark mb-1">
                    <i class="fas fa-map-marked-alt text-warning me-2"></i>Editar Regional
                </h3>
                <p class="text-muted small mb-0">Modificando la sede: <strong>{{ $regional->Denominacion }}</strong></p>
            </div>

            <form action="{{ route('Regionales.update', $regional->NIS) }}" method="POST" class="p-4">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    {{-- Código de la Regional --}}
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Código Regional</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-hashtag text-muted"></i></span>
                            <input type="text" name="Codigo" class="form-control border-sena" value="{{ $regional->Codigo }}" required>
                        </div>
                    </div>

                    {{-- Denominación --}}
                    <div class="col-md-8">
                        <label class="form-label fw-bold">Denominación / Nombre</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-signature text-muted"></i></span>
                            <input type="text" name="Denominacion" class="form-control border-sena" value="{{ $regional->Denominacion }}" required>
                        </div>
                    </div>

                    {{-- Observaciones --}}
                    <div class="col-12">
                        <label class="form-label fw-bold">Observaciones</label>
                        <textarea name="Observaciones" class="form-control border-sena" rows="4" placeholder="Detalles adicionales sobre esta regional...">{{ $regional->Observaciones }}</textarea>
                    </div>
                </div>

                {{-- Botones de Acción --}}
                <div class="mt-5 d-flex justify-content-end gap-2 border-top pt-4">
                    <a href="{{ route('Regionales.index') }}" class="btn btn-outline-secondary px-4">
                        <i class="fas fa-times me-1"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-sena px-5 shadow-sm">
                        <i class="fas fa-sync-alt me-1"></i> Actualizar Regional
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .text-sena { color: #39a900; }
        .btn-sena { background-color: #39a900; color: white; border: none; transition: 0.3s; }
        .btn-sena:hover { background-color: #2d8500; color: white; transform: translateY(-2px); }
        .border-sena:focus { border-color: #39a900; box-shadow: 0 0 0 0.25rem rgba(57, 169, 0, 0.25); }
        .card-custom { border-radius: 1rem; border: none; }
    </style>
@endsection
