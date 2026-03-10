@extends('layouts.app')

@section('contenido')
    <div class="card-custom mx-auto" style="max-width: 700px;">
        <h2 class="fw-bold text-sena mb-4 border-bottom pb-2">Información del Rol Administrativo</h2>

        <div class="row mb-3">
            <div class="col-md-4 fw-bold text-secondary">NIS:</div>
            <div class="col-md-8 bg-light p-2 rounded">{{ $rol->NIS }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4 fw-bold text-secondary">Descripción:</div>
            <div class="col-md-8 bg-light p-2 rounded">{{ $rol->Descripcion }}</div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4 fw-bold text-secondary">Documento Anexo:</div>
            <div class="col-md-8 bg-light p-2 rounded">
                @if($rol->anexo_camara)
                    <a href="{{ asset('uploads/clientes/camara/' . $rol->anexo_camara) }}" target="_blank" class="btn btn-sm btn-outline-danger">
                        <i class="fas fa-file-pdf"></i> Ver Documento Adjunto
                    </a>
                @else
                    <span class="text-muted italic">No se ha cargado ningún documento.</span>
                @endif
            </div>
        </div>

        <div class="d-flex gap-2 border-top pt-4">
            <a href="{{ route('Rolesadministrativos.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver a la Lista
            </a>
            <a href="{{ route('Rolesadministrativos.edit', $rol->NIS) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Editar Rol
            </a>
        </div>
    </div>
@endsection
