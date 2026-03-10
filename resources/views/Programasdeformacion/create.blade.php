@extends('layouts.app')

@section('contenido')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{-- Tarjeta blanca con bordes redondeados y sombra suave --}}
                <div class="card shadow-sm border-0" style="border-radius: 15px;">

                    {{-- Encabezado con el verde institucional SENA --}}
                    <div class="card-header bg-white border-0 pt-4 px-4">
                        <h2 class="fw-bold text-dark mb-0">
                            <i class="fas fa-plus-circle text-success me-2"></i>Crear Nuevo Programa
                        </h2>
                        <hr style="border-top: 3px solid #39a900; width: 50px; opacity: 1;">
                    </div>

                    <div class="card-body p-4">
                        {{-- Bloque de errores con estilo moderno --}}
                        @if ($errors->any())
                            <div class="alert alert-danger border-0 shadow-sm mb-4" style="border-radius: 10px;">
                                <h6 class="fw-bold"><i class="fas fa-exclamation-triangle me-2"></i>¡Vaya! Tenemos unos problemas:</h6>
                                <ul class="mb-0 small">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('programasdeformacion.store') }}">
                            @csrf

                            <div class="row g-3">
                                {{-- Campo Código --}}
                                <div class="col-md-4 mb-3">
                                    <label for="Codigo" class="form-label fw-bold text-secondary small uppercase">Código del Programa:</label>
                                    <input type="text" name="Codigo" id="Codigo"
                                           class="form-control border-2 shadow-none"
                                           value="{{ old('Codigo') }}"
                                           placeholder="Ej: 228106" required
                                           style="border-radius: 10px;">
                                </div>

                                {{-- Campo Denominación --}}
                                <div class="col-md-8 mb-3">
                                    <label for="Denominacion" class="form-label fw-bold text-secondary small uppercase">Denominación (Nombre):</label>
                                    <input type="text" name="Denominacion" id="Denominacion"
                                           class="form-control border-2 shadow-none"
                                           value="{{ old('Denominacion') }}"
                                           placeholder="Ej: Análisis y Desarrollo de Software" required
                                           style="border-radius: 10px;">
                                </div>
                            </div>

                            {{-- Campo Observaciones --}}
                            <div class="mb-4">
                                <label for="Observaciones" class="form-label fw-bold text-secondary small uppercase">Observaciones:</label>
                                <textarea name="Observaciones" id="Observaciones"
                                          class="form-control border-2 shadow-none"
                                          rows="4" placeholder="Notas adicionales sobre el programa..."
                                          style="border-radius: 10px;">{{ old('Observaciones') }}</textarea>
                            </div>

                            {{-- Botones de Acción unificados --}}
                            <div class="d-flex gap-2 pt-2">
                                <button type="submit" class="btn btn-success px-4 fw-bold shadow-sm" style="background-color: #39a900; border: none; border-radius: 8px;">
                                    <i class="fas fa-save me-1"></i> Guardar Programa
                                </button>
                                <a href="{{ route('programasdeformacion.index') }}" class="btn btn-light px-4 text-secondary border" style="border-radius: 8px;">
                                    Cancelar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
