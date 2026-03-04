@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="card-header"><h3>Registrar Nuevo Centro de Formación</h3></div>
            <form action="{{ route('Centrosdeformacion.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Código del Centro</label>
                            <input type="number" name="Codigo" class="form-control" required>
                        </div>
                        <div class="col-md-8">
                            <label>Nombre del Centro (Denominación)</label>
                            <input type="text" name="Denominacion" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Dirección</label>
                            <input type="text" name="Direccion" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Regional</label> <select name="tbl_regionales_NIS" class="form-control" required>
                                <option value="">Seleccione una Regional...</option>
                                @foreach($regionales as $reg)
                                    <option value="{{ $reg->NIS }}">{{ $reg->Denominacion }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label>Observaciones</label>
                            <textarea name="Observaciones" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success" style="background-color: #39a900;">Guardar Centro</button>
                    <a href="{{ route('Centrosdeformacion.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
