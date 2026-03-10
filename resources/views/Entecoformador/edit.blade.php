@extends('layouts.app')

@section('contenido')
    <div class="container py-4">
        <div class="card-custom shadow-sm bg-white rounded-4 overflow-hidden border-0">
            {{-- Encabezado con color de advertencia suave (típico de edición) --}}
            <div class="p-4 border-bottom bg-light">
                <h3 class="fw-bold text-dark mb-1">
                    <i class="fas fa-edit text-warning me-2"></i>Editar Ente Coformador
                </h3>
                <p class="text-muted small mb-0">Modificando: <strong>{{ $entes->RazonSocial }}</strong></p>
            </div>

            <form action="{{ route('Entecoformador.update', $entes->NIS) }}" method="POST" class="p-4">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    {{-- Sección 1: Identificación --}}
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Tipo de Documento</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-id-card text-muted"></i></span>
                            <select name="Tdoc" class="form-select border-sena" required>
                                <option value="1" {{ $entes->Tdoc == 1 ? 'selected' : '' }}>Cédula de Ciudadanía</option>
                                <option value="2" {{ $entes->Tdoc == 2 ? 'selected' : '' }}>Tarjeta de Identidad</option>
                                <option value="3" {{ $entes->Tdoc == 3 ? 'selected' : '' }}>NIT</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-bold">Número Documento (NIT)</label>
                        <input type="number" name="Numdoc" class="form-control border-sena" value="{{ $entes->Numdoc }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Razón Social</label>
                        <input type="text" name="RazonSocial" class="form-control border-sena" value="{{ $entes->RazonSocial }}" required>
                    </div>

                    {{-- Sección 2: Contacto --}}
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Dirección</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-map-marker-alt text-muted"></i></span>
                            <input type="text" name="Direccion" class="form-control border-sena" value="{{ $entes->Direccion }}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold">Teléfono</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-phone text-muted"></i></span>
                            <input type="text" name="Telefono" class="form-control border-sena" value="{{ $entes->Telefono }}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold">Correo Institucional</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-envelope text-muted"></i></span>
                            <input type="email" name="CorreoInstitucional" class="form-control border-sena" value="{{ $entes->CorreoInstitucional }}" required>
                        </div>
                    </div>
                </div>

                {{-- Botones de Acción --}}
                <div class="mt-5 d-flex justify-content-end gap-2 border-top pt-4">
                    <a href="{{ route('Entecoformador.index') }}" class="btn btn-outline-secondary px-4">
                        <i class="fas fa-times me-1"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-sena px-5 shadow-sm">
                        <i class="fas fa-sync-alt me-1"></i> Actualizar Ente
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
