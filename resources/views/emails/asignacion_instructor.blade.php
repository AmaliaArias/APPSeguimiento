<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<div style="font-family: sans-serif; border-top: 4px solid #39a900; padding: 20px;">
    <h2 style="color: #39a900;">Asignación de Ficha - SENA</h2>
    <p>Estimado(a) <strong>{{ $instructor->Nombres }} {{ $instructor->Apellidos }}</strong>,</p>
    <p>Se le informa que ha sido asignado oficialmente a la siguiente ficha de caracterización:</p>

    <ul style="list-style: none; background: #f9f9f9; padding: 15px; border-radius: 5px;">
        <li><strong>Código de Ficha:</strong> {{ $ficha->Codigo }}</li>
        <li><strong>Fecha de Inicio:</strong> {{ $ficha->FechaInicio }}</li>
        <li><strong>Programa:</strong> {{ $ficha->programa->Denominacion }}</li>

    </ul>

    <p>Por favor, ingrese al sistema de seguimiento para gestionar los aprendices asociados.</p>
    <hr>
    <small>Este es un correo automático, por favor no responder.</small>
</div>
</html>
