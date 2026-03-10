@extends('layouts.app')

@section('contenido')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-sm border-0" style="border-radius: 15px;">
                    <div class="card-header bg-white border-0 pt-4">
                        <h2 class="fw-bold text-success mb-0">Información del Tipo de Documento</h2>
                        <hr style="border-top: 3px solid #39a900; width: 60px;">
                    </div>

                    <div class="card-body p-4">
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-secondary">NIS:</div>
                            <div class="col-sm-8 bg-light p-2 rounded">{{ $tipodocumento->NIS }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-secondary">Denominación:</div>
                            <div class="col-sm-8 bg-light p-2 rounded text-dark fw-bold">
                                {{ $tipodocumento->Denominacion }}
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-4 fw-bold text-secondary">Observaciones:</div>
                            <div class="col-sm-8 bg-light p-3 rounded" style="min-height: 80px;">
                                {{ $tipodocumento->Observaciones }}
                            </div>
                        </div>

                        <div class="d-flex gap-2 border-top pt-4">
                            <a href="{{ route('Tiposdocumentos.index') }}" class="btn btn-secondary px-4">
                                <i class="fas fa-arrow-left me-1"></i> Volver a la Lista
                            </a>
                            <a href="{{ route('Tiposdocumentos.edit', $tipodocumento->NIS) }}" class="btn btn-warning px-4 fw-bold">
                                <i class="fas fa-edit me-1"></i> Editar Registro
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
