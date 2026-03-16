@extends('layouts.app')

@section('contenido')
    <div class="container mt-4 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-sena text-white p-3 rounded-top-4">
                        <h4 class="mb-0 text-center"><i class="fas fa-file-alt me-2"></i>Formulario Único de Registro de Práctica</h4>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('practica.store') }}" method="POST">
                            @csrf

                            <div class="alert alert-secondary border-0 mb-4">
                                <h5 class="fw-bold text-dark mb-3"><i class="fas fa-user-circle me-2"></i>Información Personal (Confirmación)</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label small text-muted">Nombre Completo</label>
                                        <input type="text" class="form-control bg-white" value="{{ $aprendiz->Nombres }} {{ $aprendiz->Apellidos }}" readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label small text-muted">Documento Identidad</label>
                                        <input type="text" class="form-control bg-white" value="{{ $aprendiz->Numdoc }}" readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label small text-muted">Correo Institucional</label>
                                        <input type="text" class="form-control bg-white" value="{{ $aprendiz->CorreoInstitucional }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <h5 class="fw-bold text-sena mb-3"><i class="fas fa-briefcase me-2"></i>Datos de la Práctica</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold small">Modalidad</label>
                                    <select name="modalidad" class="form-select border-sena" required>
                                        <option value="">Seleccione una modalidad...</option>
                                        <option value="Contrato de Aprendizaje">Contrato de Aprendizaje</option>
                                        <option value="Vínculo Laboral">Vínculo Laboral</option>
                                        <option value="Pasantía">Pasantía</option>
                                        <option value="Proyecto Productivo">Proyecto Productivo</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold small">Empresa</label>
                                    <input type="text" name="empresa" class="form-control border-sena" placeholder="Nombre o Razón Social" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold small">NIT Empresa</label>
                                    <input type="text" name="nit_empresa" class="form-control" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold small">Área / Dependencia</label>
                                    <input type="text" name="area_dependencia" class="form-control" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold small">Cargo del Aprendiz</label>
                                    <input type="text" name="cargo_aprendiz" class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold small">Fecha de Inicio</label>
                                    <input type="date" name="fecha_inicio" class="form-control" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold small">Fecha Final</label>
                                    <input type="date" name="fecha_final" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold small">Horario de la Práctica</label>
                                    <input type="text" name="horario" class="form-control border-sena" placeholder="Ej: L-V 7:00 am - 5:00 pm" required>
                                </div>
                            </div>

                            <h5 class="fw-bold text-sena mb-3 mt-4"><i class="fas fa-user-tie me-2"></i>Datos del Jefe Inmediato (Ente Coformador)</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold small">Nombre Completo del Jefe</label>
                                    <input type="text" name="nombre_jefe" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold small">Cargo del Jefe</label>
                                    <input type="text" name="cargo_jefe" class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold small">Email del Jefe</label>
                                    <input type="email" name="email_jefe" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold small">Teléfono del Jefe</label>
                                    <input type="text" name="telefono_jefe" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold small">Funciones Relevantes</label>
                                <textarea name="funciones_relevantes" class="form-control" rows="3" placeholder="Describe brevemente tus funciones..."></textarea>
                            </div>

                            <div class="d-flex justify-content-end gap-3 mt-5 mb-4 p-3 bg-light rounded-3">
                                <a href="{{ route('aprendiz.dashboard') }}" class="btn btn-secondary px-4">
                                    Cancelar
                                </a>
                                <button type="submit" class="btn btn-success px-5 fw-bold shadow-sm" style="background-color: #39a900 !important; border: none;">
                                    <i class="fas fa-save me-2"></i> GUARDAR REGISTRO
                                </button>
                            </div>
                        </form> {{-- Cierre del formulario --}}
                    </div> {{-- Cierre del card-body --}}
                </div> {{-- Cierre del card --}}
            </div> {{-- Cierre del col --}}
        </div> {{-- Cierre del row --}}
    </div> {{-- Cierre del container --}}

    <style>
        .bg-sena { background-color: #39a900; }
        .text-sena { color: #39a900; }
        .border-sena { border-color: #39a900; }
        .form-control:focus, .form-select:focus {
            border-color: #39a900;
            box-shadow: 0 0 0 0.25rem rgba(57, 169, 0, 0.25);
        }
    </style>
@endsection
