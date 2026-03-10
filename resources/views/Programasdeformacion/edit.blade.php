@extends('layouts.app')

@section('contenido')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                {{-- Tarjeta blanca estilizada --}}
                <div class="card shadow-sm border-0" style="border-radius: 15px;">

                    {{-- Encabezado con identidad SENA --}}
                    <div class="card-header bg-white border-0 pt-4 px-4">
                        <h2 class="fw-bold text-dark mb-0">
                            <i class="fas fa-graduation-cap text-success me-2"></i>Editar Programa
                        </h2>
                        <p class="text-muted small mb-0">{{ $programa->Denominacion }}</p>
                        <hr style="border-top: 3px solid #39a900; width: 50px; opacity: 1;">
                    </div>

                    <div class="card-body p-4">
                        {{-- Mantenemos tu ruta con NIS que ya te funciona --}}
                        <form action="{{ route('programasdeformacion.update', $programa->NIS) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                {{-- Campo Código --}}
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold text-secondary">Código del Programa:</label>
                                    <input type="number" name="Codigo"
                                           class="form-control border-2 shadow-none"
                                           value="{{ $programa->Codigo }}"
                                           required style="border-radius: 10px;">
                                </div>

                                {{-- Campo Denominación --}}
                                <div class="col-md-8 mb-3">
                                    <label class="form-label fw-bold text-secondary">Denominación:</label>
                                    <input type="text" name="Denominacion"
                                           class="form-control border-2 shadow-none"
                                           value="{{ $programa->Denominacion }}"
                                           required style="border-radius: 10px;">
                                </div>
                            </div>

                            {{-- Campo Observaciones ampliado --}}
                            <div class="mb-4">
                                <label class="form-label fw-bold text-secondary">Observaciones:</label>
                                <textarea name="Observaciones"
                                          class="form-control border-2 shadow-none"
                                          rows="4"
                                          style="border-radius: 10px;">{{ $programa->Observaciones }}</textarea>
                            </div>

                            {{-- Botones de Acción --}}
                            <div class="d-flex gap-2 pt-2">
                                <button type="submit" class="btn btn-success px-4 fw-bold shadow-sm" style="background-color: #39a900; border: none; border-radius: 8px;">
                                    <i class="fas fa-check-circle me-1"></i> Actualizar Programa
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
