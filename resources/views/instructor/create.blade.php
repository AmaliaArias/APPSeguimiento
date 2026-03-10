@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="card-header"><h3>Registrar Nuevo Instructor</h3></div>
            <form action="{{ route('instructor.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Tipo de Documento</label>
                            <select name="Tdoc" class="form-control" required>
                                <option value="">Seleccione...</option>
                                @foreach($tiposDoc as $t)
                                    <option value="{{ $t->NIS }}">{{ $t->Denominacion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Número Documento</label>
                            <input type="number" name="Numdoc" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label>Nombres</label>
                            <input type="text" name="Nombres" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label>Apellidos</label>
                            <input type="text" name="Apellidos" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label>Dirección</label>
                            <input type="text" name="Direccion" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>Teléfono</label>
                            <input type="text" name="Telefono" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>Sexo</label>
                            <select name="Sexo" class="form-control">
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label>Correo Institucional</label>
                            <input type="email" name="CorreoInstitucional" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label>Correo Personal</label>
                            <input type="email" name="CorreoPersonal" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>Fecha de Nacimiento</label>
                            <input type="date" name="FechaNac" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Rol Administrativo</label>
                            <select name="tbl_rolesadministrativos_NIS" class="form-control" required>
                                <option value="">Seleccione Rol...</option>
                                @foreach($roles as $r)
                                    <option value="{{ $r->NIS }}">{{ $r->Descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>EPS</label>
                            <select name="tbl_eps_NIS" class="form-control" required>
                                <option value="">Seleccione EPS...</option>
                                @foreach($eps as $e)
                                    <option value="{{ $e->NIS }}">{{ $e->Denominacion }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="tbl_tiposdocumentos_NIS" value="1">
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success" style="background-color: #39a900;">Guardar Instructor</button>
                    <a href="{{ route('instructor.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
