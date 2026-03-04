@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Nuevo Tipo de Documento</h3>
            </div>

            <form method="POST" action="{{ route('Tiposdocumentos.store') }}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label>Denominación</label>
                            <input type="text" name="Denominacion" class="form-control" required placeholder="Ej: Cédula de Ciudadanía">
                        </div>
                    </div>

                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-12 form-group">
                            <label>Observaciones</label>
                            <textarea name="Observaciones" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success" style="background-color: #39a900;">Guardar</button>
                    <a href="{{ route('Tiposdocumentos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
