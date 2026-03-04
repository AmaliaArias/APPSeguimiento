@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Crear Nueva Regional</h2>
            </div>

            {{-- Bloque para mostrar errores de validación --}}
            @if ($errors->any())
                <div style="background-color: #ffdddd; color: #900; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                    <strong>¡Vaya! Tenemos unos problemas:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('regionales.store') }}">
                @csrf

                <div class="card-body">
                    <div class="form-group row">

                        <div class="form-group col-md-4">
                            <label for="Codigo">Código Regional</label>
                            <input type="text" name="Codigo" id="Codigo" class="form-control" value="{{ old('Codigo') }}" placeholder="Ej: 05">
                        </div>

                        <div class="form-group col-md-8">
                            <label for="Denominacion">Nombre de la Regional</label>
                            <input type="text" name="Denominacion" id="Denominacion" class="form-control" value="{{ old('Denominacion') }}" placeholder="Ej: Regional Antioquia">
                        </div>

                    </div>

                    <div class="form-group row" style="margin-top: 15px;">
                        <div class="form-group col-md-12">
                            <label for="Observaciones">Observaciones</label>
                            <textarea name="Observaciones" id="Observaciones" class="form-control" rows="3">{{ old('Observaciones') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="card-footer" style="margin-top: 20px;">
                    <button type="submit" style="background-color: #39a900; color: white; padding: 10px 25px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">
                        Guardar Regional
                    </button>
                    <a href="{{ route('Regionales.index') }}" style="margin-left: 10px; color: #666; text-decoration: none;">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
