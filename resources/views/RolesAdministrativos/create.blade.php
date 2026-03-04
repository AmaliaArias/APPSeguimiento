@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Nuevo Rol Administrativo</h2>
            </div>

            <form method="POST" action="{{ route('Rolesadministrativos.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="Descripcion">Descripción del Rol</label>
                        <input type="text" name="Descripcion" id="Descripcion" class="form-control"
                               value="{{ old('Descripcion') }}" placeholder="Ej: Instructor, Coordinador, Bienestar..." required>
                    </div>

                    <div class="form-group">
                        <label for="anexo_camara">Anexo (PDF)</label>
                        <div class="input-group">
                            <input type="file" name="anexo_camara" id="anexo_camara" class="form-control" accept="application/pdf">
                        </div>
                        <small class="text-muted">Seleccione el archivo PDF .</small>
                    </div>


                </div>

                <div class="card-footer" style="margin-top: 20px;">
                    <button type="submit" style="background-color: #39a900; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-weight: bold;">
                        Guardar Rol
                    </button>
                    <a href="{{ route('Rolesadministrativos.index') }}" style="margin-left: 10px; color: #666; text-decoration: none;">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
