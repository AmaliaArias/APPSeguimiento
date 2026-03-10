@extends('layouts.app')

@section('contenido')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="card shadow-sm border-0 rounded-4">
                    {{-- Encabezado del Formulario --}}
                    <div class="card-header bg-white py-3 border-bottom">
                        <div class="d-flex align-items-center">
                            <div class="icon-box bg-sena-light text-sena me-3 rounded-3 p-2">
                                <i class="fas fa-user-edit fa-lg"></i>
                            </div>
                            <div>
                                <h4 class="fw-bold mb-0">Editar Instructor: <span class="text-sena">{{ $instructor->Nombres }}</span></h4>
                                <p class="text-muted small mb-0">Modifique la información necesaria del registro</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        {{-- Formulario de Actualización --}}
                        <form action="{{ route('instructor.update', $instructor->NIS) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row g-4">
                                {{-- Sección: Información Personal --}}
                                <div class="col-12">
                                    <h6 class="text-uppercase text-muted fw-bold small border-bottom pb-2 mb-3">Información Personal</h6>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label fw-bold small text-dark">Tipo de Documento</label>
                                    <select name="Tdoc" class="form-select shadow-sm" required>
                                        <option value="Cedula de Ciudadania" {{ $instructor->Tdoc == 'Cedula de Ciudadania' ? 'selected' : '' }}>Cedula de Ciudadania</option>
                                        <option value="Cedula de Extranjeria" {{ $instructor->Tdoc == 'Cedula de Extranjeria' ? 'selected' : '' }}>Cedula de Extranjeria</option>
                                        <option value="Tarjeta de Identidad" {{ $instructor->Tdoc == 'Tarjeta de Identidad' ? 'selected' : '' }}>Tarjeta de Identidad</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label fw-bold small text-dark">Documento</label>
                                    <input type="text" name="Numdoc" value="{{ $instructor->Numdoc }}" class="form-control shadow-sm" required>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label fw-bold small text-dark">Nombres</label>
                                    <input type="text" name="Nombres" value="{{ $instructor->Nombres }}" class="form-control shadow-sm" required>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label fw-bold small text-dark">Apellidos</label>
                                    <input type="text" name="Apellidos" value="{{ $instructor->Apellidos }}" class="form-control shadow-sm" required>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label fw-bold small text-dark">Sexo</label>
                                    <select name="Sexo" class="form-select shadow-sm">
                                        <option value="Masculino" {{ $instructor->Sexo == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                        <option value="Femenino" {{ $instructor->Sexo == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label fw-bold small text-dark">Fecha de Nacimiento</label>
                                    <input type="date" name="FechaNac" value="{{ $instructor->FechaNac }}" class="form-control shadow-sm">
                                </div>

                                {{-- Sección: Contacto y Ubicación --}}
                                <div class="col-12 mt-5">
                                    <h6 class="text-uppercase text-muted fw-bold small border-bottom pb-2 mb-3">Contacto y Ubicación</h6>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-dark">Dirección de Residencia</label>
                                    <input type="text" name="Direccion" value="{{ $instructor->Direccion }}" class="form-control shadow-sm">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-dark">Teléfono Celular</label>
                                    <input type="text" name="Telefono" value="{{ $instructor->Telefono }}" class="form-control shadow-sm">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-dark">Correo Institucional</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white"><i class="fas fa-envelope text-sena"></i></span>
                                        <input type="email" name="CorreoInstitucional" value="{{ $instructor->CorreoInstitucional }}" class="form-control shadow-sm">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-dark">Correo Personal</label>
                                    <input type="email" name="CorreoPersonal" value="{{ $instructor->CorreoPersonal }}" class="form-control shadow-sm">
                                </div>

                                {{-- Sección: Vinculación --}}
                                <div class="col-12 mt-5">
                                    <h6 class="text-uppercase text-muted fw-bold small border-bottom pb-2 mb-3">Vinculación Administrativa</h6>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-dark">Rol Administrativo (NIS)</label>
                                    <input type="number" name="tbl_rolesadministrativos_NIS" value="{{ $instructor->tbl_rolesadministrativos_NIS }}" class="form-control shadow-sm">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-dark">EPS (NIS)</label>
                                    <input type="number" name="tbl_eps_NIS" value="{{ $instructor->tbl_eps_NIS }}" class="form-control shadow-sm">
                                </div>
                            </div>

                            {{-- Botones de Acción --}}
                            <div class="row mt-5">
                                <div class="col-12 d-flex justify-content-end gap-2">
                                    <a href="{{ route('instructor.index') }}" class="btn btn-light px-4 border shadow-sm">
                                        <i class="fas fa-times me-1"></i> Cancelar
                                    </a>
                                    <button type="submit" class="btn btn-sena px-5 shadow-sm">
                                        <i class="fas fa-save me-1"></i> Actualizar Instructor
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .text-sena { color: #39a900; }
        .bg-sena-light { background-color: #e8f5e9; }
        .btn-sena { background-color: #39a900; color: white; transition: 0.3s; }
        .btn-sena:hover { background-color: #2d8500; color: white; transform: translateY(-2px); }
        .form-control:focus, .form-select:focus { border-color: #39a900; box-shadow: 0 0 0 0.25rem rgba(57, 169, 0, 0.15); }
        label { margin-bottom: 0.5rem; }
    </style>
@endsection
