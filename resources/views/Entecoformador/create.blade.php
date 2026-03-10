@extends('layouts.app')

@section('contenido')
    <div class="container py-4">
        <div class="card-custom shadow-sm bg-white rounded-4 overflow-hidden border-0">
            {{-- Encabezado con degradado suave o fondo sólido institucional --}}
            <div class="p-4 border-bottom bg-light">
                <h3 class="fw-bold text-dark mb-1"><i class="fas fa-building text-sena me-2"></i>Nuevo Ente Coformador</h3>
                <p class="text-muted small mb-0">Complete la información legal y de contacto de la entidad.</p>
            </div>

            <form action="{{ route('Entecoformador.store') }}" method="POST" class="p-4">
                @csrf

                <div class="row g-4">
                    {{-- Sección 1: Identificación --}}
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Tipo de Documento</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-id-card text-muted"></i></span>
                            <select name="Tdoc" class="form-select border-sena" required>
                                <option value="">Seleccione...</option>
                                <option value="1">Cédula de Ciudadanía</option>
                                <option value="2">Tarjeta de Identidad</option>
                                <option value="3">NIT</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-bold">Número Documento (NIT)</label>
                        <input type="number" name="Numdoc" class="form-control border-sena" placeholder="Ej: 900123456" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Razón Social</label>
                        <input type="text" name="RazonSocial" class="form-control border-sena" placeholder="Nombre legal de la empresa" required>
                    </div>

                    {{-- Sección 2: Contacto --}}
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Dirección</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-map-marker-alt text-muted"></i></span>
                            <input type="text" name="Direccion" class="form-control border-sena" placeholder="Calle, Carrera, Ciudad">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold">Teléfono</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-phone text-muted"></i></span>
                            <input type="text" name="Telefono" class="form-control border-sena" placeholder="Fijo o Celular">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold">Correo Institucional</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="fas fa-envelope text-muted"></i></span>
                            <input type="email" name="CorreoInstitucional" class="form-control border-sena" placeholder="ejemplo@empresa.com" required>
                        </div>
                    </div>
                </div>

                <div class="mt-5 d-flex justify-content-end gap-2 border-top pt-4">
                    <a href="{{ route('Entecoformador.index') }}" class="btn btn-outline-secondary px-4">
                        <i class="fas fa-times me-1"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-sena px-5 shadow-sm">
                        <i class="fas fa-save me-1"></i> Guardar Ente
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
        .card-custom { border-radius: 1rem; }
    </style>
@endsection
