@extends('layouts.app')

@section('contenido')
    <div style="max-width: 700px; margin: 20px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); font-family: sans-serif;">
        <h2 style="color: #39a900; border-bottom: 2px solid #39a900; padding-bottom: 10px;">
            Información de los Roles Administrativos
        </h2>

        <div style="margin-top: 25px; display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div>
                <p style="margin: 0;"><strong>NIS:</strong></p>
                <p style="background: #f9f9f9; padding: 8px; border-radius: 4px;">{{ $rol->NIS }}</p>

                <p style="margin: 0;"><strong>Descripción:</strong></p>
                <p style="background: #f9f9f9; padding: 8px; border-radius: 4px;">{{ $rol->Descripcion }}</p>

            </div>

        </div>

        <div style="margin-top: 30px; display: flex; gap: 10px;">
            <a href="{{ route('Rolesadministrativos.index') }}" style="background: #666; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">Volver a la Lista</a>
            <a href="{{ route('Rolesadministrativos.edit', $rol->NIS) }}" style="background: #ffc107; color: black; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">Editar Rol</a>
        </div>
    </div>
@endsection
