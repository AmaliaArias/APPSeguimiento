@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Registrar Nueva EPS</h2>
            </div>

            <form method="POST" action="{{ route('Eps.store') }}">
                @csrf
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-4">
                            <label for="Numdoc">Número de Documento</label>
                            <input type="text" name="Numdoc" id="Numdoc" class="form-control" value="{{ old('Numdoc') }}" placeholder="Ej: 800.123.456-1" required>
                        </div>

                        <div class="form-group col-md-8">
                            <label for="Denominacion">Nombre de la EPS</label>
                            <input type="text" name="Denominacion" id="Denominacion" class="form-control" value="{{ old('Denominacion') }}" placeholder="Ej: Sura, Sanitas, etc." required>
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: 15px;">
                        <label for="Observaciones">Observaciones</label>
                        <textarea name="Observaciones" id="Observaciones" class="form-control" rows="3">{{ old('Observaciones') }}</textarea>
                    </div>
                </div>

                <div class="card-footer" style="margin-top: 20px;">
                    <button type="submit" style="background-color: #39a900; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-weight: bold;">
                        Guardar EPS
                    </button>
                    <a href="{{ route('Eps.index') }}" style="margin-left: 10px; color: #666; text-decoration: none;">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
