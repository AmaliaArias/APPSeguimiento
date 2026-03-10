@extends('layouts.app')

@section('contenido')
    <div class="container py-4">
        <div class="card-custom shadow-sm bg-white rounded-4 overflow-hidden border-0" style="max-width: 800px; margin: auto;">

            {{-- Encabezado --}}
            <div class="p-4 border-bottom bg-light">
                <h3 class="fw-bold text-dark mb-1">
                    <i class="fas fa-map-plus text-sena me-2"></i>Crear Nueva Regional
                </h3>
                <p class="text-muted small mb-0">Registre una nueva sede administrativa regional en el sistema.</p>
            </div>

            {{-- Bloque de errores estilizado --}}
            @if ($errors->any())
                <div class="mx-4 mt-3 alert alert-danger border-0 shadow-sm rounded-3">
                    <div class="d-flex">
                        <i class="fas fa-exclamation-circle mt-1 me-2"></i>
                        <div>
                            <strong class="d-block mb-1">¡Vaya! Tenemos unos problemas:</strong>
                            <ul class="mb-0 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('regionales.store') }}" class="p-4">
                @csrf

                <div class="row g-4">
                    {{-- Código de la Regional --}}
                    <div class="col-md-4">
                        <label for="Codigo" class="form-label fw-bold">Código Regional</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="fas fa-hashtag text-muted"></i></span>
                            <input type="text" name="Codigo" id="Codigo"
                                   class="form-control border-sena border-start-0"
                                   value="{{ old('Codigo') }}"
                                   placeholder="Ej: 05" required>
                        </div>
                    </div>

                    {{-- Nombre de la Regional --}}
                    <div class="col-md-8">
                        <label for="Denominacion" class="form-label fw-bold">Nombre de la Regional</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="fas fa-signature text-muted"></i></span>
                            <input type="text" name="Denominacion" id="Denominacion"
                                   class="form-control border-sena border-start-0"
                                   value="{{ old('Denominacion') }}"
                                   placeholder="Ej: Regional Antioquia" required>
                        </div>
                    </div>

                    {{-- Observaciones --}}
                    <div class="col-12">
                        <label for="Observaciones" class="form-label fw-bold">Observaciones (Opcional)</label>
                        <textarea name="Observaciones" id="Observaciones"
                                  class="form-control border-sena"
                                  rows="4"
                                  placeholder="Escriba aquí cualquier detalle adicional sobre esta sede...">{{ old('Observaciones') }}</textarea>
                    </div>
                </div>

                {{-- Pie del formulario con acciones --}}
                <div class="mt-5 d-flex justify-content-end gap-2 border-top pt-4">
                    <a href="{{ route('Regionales.index') }}" class="btn btn-outline-secondary px-4">
                        <i class="fas fa-times me-1"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-sena px-5 shadow-sm">
                        <i class="fas fa-save me-1"></i> Guardar Regional
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .text-sena { color: #39a900; }
        .btn-sena { background-color: #39a900; color: white; border: none; transition: 0.3s; font-weight: bold; }
        .btn-sena:hover { background-color: #2d8500; color: white; transform: translateY(-2px); }
        .border-sena:focus { border-color: #39a900; box-shadow: 0 0 0 0.25rem rgba(57, 169, 0, 0.15); }
        .card-custom { border-radius: 1rem; }
        .input-group-text { border-color: #dee2e6; }
    </style>
@endsection
