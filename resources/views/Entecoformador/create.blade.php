@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="card-header"><h3>Nuevo Ente Coformador</h3></div>
            <form action="{{ route('Entecoformador.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">


                        <select name="Tdoc" class="form-control" required>
                            <option value="">Seleccione...</option>
                            {{-- Revisa en tu tabla Tipos de Documentos qué NIS tiene cada uno --}}
                            <option value="1">Cédula de Ciudadanía</option>
                            <option value="2">Tarjeta de Identidad</option>
                            <option value="3">NIT</option>
                        </select>


                        <div class="col-md-3">
                            <label>Número Documento (NIT)</label>
                            <input type="number" name="Numdoc" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Razón Social</label>
                            <input type="text" name="RazonSocial" class="form-control" required>
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
                            <label>Correo Institucional</label>
                            <input type="email" name="CorreoInstitucional" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success" style="background-color: #39a900;">Guardar Ente</button>
                    <a href="{{ route('Entecoformador.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
