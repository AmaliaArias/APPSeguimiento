@extends('layouts.app')

@section('contenido')
    <div style="max-width: 600px; margin: 20px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
        <h2 style="color: #39a900; border-bottom: 2px solid #39a900; padding-bottom: 10px;">Detalle Ente Coformador</h2>

        <div style="margin-top: 20px; line-height: 2;">
            <p><strong>Razón Social:</strong> {{ $entes->RazonSocial }}</p>
            <p><strong>NIT:</strong> {{ $entes->Numdoc }}</p>
            <p><strong>Dirección:</strong> {{ $entes->Direccion }}</p>
            <p><strong>Teléfono:</strong> {{ $entes->Telefono }}</p>
            <p><strong>Correo:</strong> {{ $entes->CorreoInstitucional }}</p>
        </div>

        <div style="margin-top: 30px;">
            <a href="{{ route('Entecoformador.index') }}" style="background: #666; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Volver</a>
        </div>
    </div>
@endsection
