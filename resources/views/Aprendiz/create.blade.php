@extends('layouts.app')

@section('contenido')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                {{-- Tarjeta principal con estilo de bloques --}}
                <div class="card shadow-sm border-0" style="border-radius: 15px;">

                    <div class="card-header bg-white border-0 pt-4 px-4">
                        <h2 class="fw-bold text-success mb-0">
                            <i class="fas fa-user-plus me-2"></i>Registrar Nuevo Aprendiz
                        </h2>
                        <hr style="border-top: 3px solid #39a900; width: 60px; opacity: 1;">
                        <p class="text-muted small mt-2">Complete la información para dar de alta al aprendiz en el sistema de seguimiento.</p>
                    </div>

                    <form action="{{ route('Aprendiz.store') }}" method="POST">
                        @csrf

                        <div class="card-body p-4">
                            <div class="row g-4">

                                {{-- BLOQUE 1: Identificación (Borde Azul) --}}
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded border-start border-4 border-info shadow-sm h-100">
                                        <h6 class="fw-bold text-info mb-3 text-uppercase small">Documentos de Identidad</h6>

                                        <div class="mb-3">
                                            <label class="form-label small fw-bold">Tipo de Documento</label>
                                            <select name="tbl_tiposdocumentos_NIS" class="form-select border-0 bg-white shadow-sm" required>
                                                <option value="" disabled selected>Seleccione el tipo...</option>
                                                @foreach($tiposDoc as $tipo)
                                                    <option value="{{ $tipo->NIS }}" {{ old('tbl_tiposdocumentos_NIS') == $tipo->NIS ? 'selected' : '' }}>
                                                        {{ $tipo->Denominacion }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label small fw-bold">Número de Documento</label>
                                            <input type="text" name="Numdoc" class="form-control border-0 bg-white shadow-sm"
                                                   placeholder="Ej: 1000234567" required value="{{ old('Numdoc') }}">
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <label class="form-label small fw-bold">Sexo</label>
                                                <select name="Sexo" class="form-select border-0 bg-white shadow-sm">
                                                    <option value="1" {{ old('Sexo') == '1' ? 'selected' : '' }}>Masculino</option>
                                                    <option value="0" {{ old('Sexo') == '0' ? 'selected' : '' }}>Femenino</option>
                                                    <option value="2" {{ old('Sexo') == '2' ? 'selected' : '' }}>Otro</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label small fw-bold">F. Nacimiento</label>
                                                <input type="date" name="FechaNac" class="form-control border-0 bg-white shadow-sm"
                                                       value="{{ old('FechaNac') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- BLOQUE 2: Nombres y Contacto (Borde Verde) --}}
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded border-start border-4 border-success shadow-sm h-100">
                                        <h6 class="fw-bold text-success mb-3 text-uppercase small">Nombres y Apellidos</h6>

                                        <div class="mb-3">
                                            <label class="form-label small fw-bold">Nombres Completos</label>
                                            <input type="text" name="Nombres" class="form-control border-0 bg-white shadow-sm"
                                                   placeholder="Nombres del aprendiz" required value="{{ old('Nombres') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label small fw-bold">Apellidos Completos</label>
                                            <input type="text" name="Apellidos" class="form-control border-0 bg-white shadow-sm"
                                                   placeholder="Apellidos del aprendiz" required value="{{ old('Apellidos') }}">
                                        </div>

                                        <div class="mb-0">
                                            <label class="form-label small fw-bold">Teléfono de Contacto</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-white border-0"><i class="fas fa-phone text-muted"></i></span>
                                                <input type="text" name="Telefono" class="form-control border-0 bg-white shadow-sm"
                                                       placeholder="Ej: 3001234567" value="{{ old('Telefono') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- BLOQUE 3: Vinculación Académica y Salud (Borde Naranja) --}}
                                <div class="col-12">
                                    <div class="p-4 bg-light rounded border-start border-4 border-warning shadow-sm">
                                        <h6 class="fw-bold text-warning mb-3 text-uppercase small">Vinculación Académica y Salud</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label small fw-bold">Ficha de Caracterización</label>
                                                <select name="tbl_fichasdecaracterizacion_NIS" class="form-select border-0 bg-white shadow-sm" required>
                                                    <option value="" disabled selected>Asignar a una ficha...</option>
                                                    @foreach($fichas as $ficha)
                                                        <option value="{{ $ficha->NIS }}" {{ old('tbl_fichasdecaracterizacion_NIS') == $ficha->NIS ? 'selected' : '' }}>
                                                            {{ $ficha->Codigo }} - {{ $ficha->Denominacion }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label small fw-bold">EPS Asociada</label>
                                                <select name="tbl_eps_NIS" class="form-select border-0 bg-white shadow-sm" required>
                                                    <option value="" disabled selected>Seleccione la EPS...</option>
                                                    @foreach($eps as $e)
                                                        <option value="{{ $e->NIS }}" {{ old('tbl_eps_NIS') == $e->NIS ? 'selected' : '' }}>
                                                            {{ $e->Denominacion }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- BLOQUE 4: Correos y Dirección (Borde Gris) --}}
                                <div class="col-12">
                                    <div class="p-4 bg-light rounded border-start border-4 border-secondary shadow-sm">
                                        <h6 class="fw-bold text-secondary mb-3 text-uppercase small">Información de Localización y Correo</h6>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label small fw-bold">Correo Institucional</label>
                                                <input type="email" name="CorreoInstitucional" class="form-control border-0 bg-white shadow-sm"
                                                       placeholder="ejemplo@soy.sena.edu.co" required value="{{ old('CorreoInstitucional') }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label small fw-bold">Correo Personal</label>
                                                <input type="email" name="CorreoPersonal" class="form-control border-0 bg-white shadow-sm"
                                                       placeholder="ejemplo@gmail.com" value="{{ old('CorreoPersonal') }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label small fw-bold">Dirección de Residencia</label>
                                                <input type="text" name="Direccion" class="form-control border-0 bg-white shadow-sm"
                                                       placeholder="Carrera 12 # 34 - 56" value="{{ old('Direccion') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Botones de Acción --}}
                            <div class="d-flex gap-2 border-top pt-4 mt-4 justify-content-end">
                                <a href="{{ route('Aprendiz.index') }}" class="btn btn-outline-secondary px-4 fw-bold" style="border-radius: 8px;">
                                    Cancelar
                                </a>
                                <button type="submit" class="btn btn-sena px-5 fw-bold shadow-sm" style="border-radius: 8px;">
                                    <i class="fas fa-save me-1"></i> Guardar Aprendiz
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn-sena { background-color: #39a900; color: white; border: none; transition: 0.3s; }
        .btn-sena:hover { background-color: #2d8500; color: white; transform: translateY(-2px); }
        .form-control:focus, .form-select:focus { box-shadow: 0 4px 10px rgba(0,0,0,0.05) !important; border: 1px solid #39a900 !important; }
        .input-group-text { border-radius: 0.375rem 0 0 0.375rem; }
        .border-warning { border-color: #ffc107 !important; }
    </style>
@endsection
