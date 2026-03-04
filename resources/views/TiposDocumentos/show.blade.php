
@extends('layouts.app')

@section('contenido')
    <div style="max-width: 700px; margin: 20px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); font-family: sans-serif;">
        <h2 style="color: #39a900; border-bottom: 2px solid #39a900; padding-bottom: 10px;">
            Información de la Regional
        </h2>

        <div style="margin-top: 25px; display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div>
                <p style="margin: 0;"><strong>NIS:</strong></p>
                <p style="background: #f9f9f9; padding: 8px; border-radius: 4px;">{{ $tipodocumento->NIS }}</p>

                <p style="margin: 0;"><strong>Denominacion:</strong></p>
                <p style="background: #f9f9f9; padding: 8px; border-radius: 4px;">{{ $tipodocumento->Denominacion }}</p>
            </div>

        <div style="margin-top: 20px;">
            <p style="margin: 0;"><strong>Observaciones:</strong></p>
            <div style="background: #f4f4f4; padding: 15px; border-radius: 5px; min-height: 80px; border-left: 5px solid #39a900; margin-top: 5px;">
                {{ $tipodocumento->Observaciones ?: 'No hay observaciones para este Tipo de Documento.' }}
            </div>
        </div>

        <div style="margin-top: 30px; display: flex; gap: 10px;">
            <a href="{{ route('Tiposdocumentos.index') }}" style="background: #666; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">Volver a la Lista</a>
            <a href="{{ route('Tiposdocumentos.edit', $tipodocumento->NIS) }}" style="background: #ffc107; color: black; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">Editar Regional</a>
        </div>
    </div>
@endsection

