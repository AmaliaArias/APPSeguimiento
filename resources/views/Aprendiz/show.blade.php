@extends('layouts.app')

@section('contenido')
    <div style="max-width: 800px; margin: 20px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
        <h2 style="color: #39a900; border-bottom: 2px solid #39a900; padding-bottom: 10px;">
            Ficha Técnica del Aprendiz
        </h2>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 20px;">
            <div style="background: #f9f9f9; padding: 15px; border-radius: 8px;">
                <h3 style="color: #666; margin-top: 0;">Identificación</h3>
                <p><strong>Nombres:</strong> {{ $aprendiz->Nombres }}</p>
                <p><strong>Apellidos:</strong> {{ $aprendiz->Apellidos }}</p>
                <p><strong>Tipo Doc:</strong> {{ $tipoDoc->Denominacion ?? 'N/A' }}</p>
                <p><strong>Número:</strong> {{ $aprendiz->Numdoc }}</p>
                <p><strong>Sexo:</strong> {{ $aprendiz->Sexo == 'M' ? 'Masculino' : 'Femenino' }}</p>
                <p><strong>Fecha Nacimiento:</strong> {{ $aprendiz->FechaNac }}</p>
            </div>

            <div style="background: #f9f9f9; padding: 15px; border-radius: 8px;">
                <h3 style="color: #666; margin-top: 0;">Contacto y Ubicación</h3>
                <p><strong>Dirección:</strong> {{ $aprendiz->Direccion }}</p>
                <p><strong>Teléfono:</strong> {{ $aprendiz->Telefono }}</p>
                <p><strong>Correo Institucional:</strong><br>
                    <small style="color: #007bff;">{{ $aprendiz->CorreoInstitucional }}</small></p>
                <p><strong>Correo Personal:</strong><br>
                    <small>{{ $aprendiz->CorreoPersonal }}</small></p>
            </div>
        </div>

        <div style="margin-top: 20px; background: #e8f5e9; padding: 15px; border-radius: 8px; border-left: 5px solid #39a900;">
            <p style="margin: 0;"><strong>NIS de Registro:</strong> {{ $aprendiz->NIS }}</p>
            <p style="margin: 5px 0 0 0;"><strong>Estado en Ficha:</strong> Vinculado</p>
        </div>

        <div style="margin-top: 30px; display: flex; gap: 10px;">
            <a href="{{ route('Aprendiz.index') }}" style="background: #666; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">Volver a la Lista</a>
            <a href="{{ route('Aprendiz.edit', $aprendiz->NIS) }}" style="background: #ffc107; color: black; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">Editar Aprendiz</a>
        </div>
    </div>
@endsection
