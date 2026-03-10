@extends('layouts.app')

@section('contenido')
    <div class="card-custom mx-auto" style="max-width: 600px;">
        <h2 class="fw-bold mb-4">Editar Rol Administrativo</h2>

        <form action="{{ route('Rolesadministrativos.update', $rol->NIS) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-bold">Descripción:</label>
                <input type="text" name="Descripcion" class="form-control" value="{{ $rol->Descripcion }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Actualizar Anexo (PDF):</label>
                <input type="file" name="anexo_camara" class="form-control" accept="application/pdf">
                @if($rol->anexo_camara)
                    <div class="mt-2 small text-muted">
                        <i class="fas fa-file-pdf text-danger"></i> Archivo actual: {{ $rol->anexo_camara }}
                    </div>
                @endif
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-sena">Actualizar Rol Administrativo</button>
                <a href="{{ route('Rolesadministrativos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
