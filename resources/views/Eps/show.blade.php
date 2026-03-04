@extends('layouts.app')

@section('contenido')
    <div style="max-width: 600px; margin: 20px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
        <h2 style="color: #39a900; border-bottom: 2px solid #39a900; padding-bottom: 10px;">Detalle de la EPS</h2>
        <div style="margin-top: 20px; line-height: 2;">
            <p><strong>NIS:</strong> {{ $eps->NIS }}</p>
            <p><strong>Numero de Documento:</strong> {{ $eps->Numdoc }}</p>
            <p><strong>Nombre de la EPS:</strong> {{ $eps->Denominacion }}</p>
        </div>

        <div style="margin-top: 20px;">
            <p style="margin: 0;"><strong>Observaciones:</strong></p>
            <div style="background: #f4f4f4; padding: 15px; border-radius: 5px; min-height: 80px; border-left: 5px solid #39a900; margin-top: 5px;">
                {{ $eps->Observaciones ?: 'No hay observaciones para esta EPS.' }}
            </div>
        </div>
        <div style="margin-top: 30px;">
            <a href="{{ route('Eps.index') }}" style="background: #666; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Volver a la lista</a>
        </div>
    </div>
@endsection
