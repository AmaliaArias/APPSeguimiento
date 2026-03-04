@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="card-header"><h3>Registrar Aprendiz</h3></div>
            <form action="{{ route('Aprendiz.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Tipo Doc</label>
                            <select name="Tdoc" class="form-control" required>
                                <option value="CC">Cédula de Ciudadanía</option>
                                <option value="TI">Tarjeta de Identidad</option>
                                <option value="PEP">Pasaporte</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Número Documento</label>
                            <input type="text" name="Numdoc" class="form-control" required>
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
                        <div class="col-md-6">
                            <label>Correo Institucional</label>
                            <input type="email" name="CorreoInstitucional" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Correo Personal</label>
                            <input type="email" name="CorreoPersonal" class="form-control">
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
                        <div class="col-md-2">
                            <label>Sexo</label>
                            <select name="Sexo" class="form-control">
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="O">Otro</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Fecha Nacimiento</label>
                            <input type="date" name="FechaNacimiento" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success" style="background-color: #39a900;">Guardar Aprendiz</button>
                    <a href="{{ route('Aprendiz.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
