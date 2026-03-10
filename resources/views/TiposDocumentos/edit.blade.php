@extends('layouts.app')

@section('contenido')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0" style="border-radius: 15px;">
                    {{-- Encabezado con color SENA --}}
                    <div class="card-header bg-white border-0 pt-4">
                        <h2 class="fw-bold text-dark mb-0">
                            <i class="fas fa-edit text-success me-2"></i>Editar Tipo de Documento
                        </h2>
                        <hr style="border-top: 3px solid #39a900; width: 50px;">
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('Tiposdocumentos.update', $tipodocumento->NIS) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- Campo Denominación --}}
                            <div class="mb-4">
                                <label class="form-label fw-bold text-secondary">Denominación:</label>
                                <input type="text" name="Denominacion"
                                       class="form-control form-control-lg border-2"
                                       value="{{ $tipodocumento->Denominacion }}"
                                       placeholder="Ej: Cédula de Ciudadanía"
                                       required style="border-radius: 10px;">
                            </div>

                            {{-- Campo Observaciones --}}
                            <div class="mb-4">
                                <label class="form-label fw-bold text-secondary">Observaciones:</label>
                                <textarea name="Observaciones"
                                          class="form-control border-2"
                                          rows="3"
                                          style="border-radius: 10px;"
                                          required>{{ $tipodocumento->Observaciones }}</textarea>
                            </div>

                            {{-- Botones de Acción --}}
                            <div class="d-grid gap-2 d-md-flex justify-content-md-start pt-2">
                                <button type="submit" class="btn btn-success btn-lg px-4 fw-bold shadow-sm" style="background-color: #39a900;">
                                    <i class="fas fa-save me-1"></i> Actualizar
                                </button>
                                <a href="{{ route('Tiposdocumentos.index') }}" class="btn btn-light btn-lg px-4 text-secondary border">
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
