@extends('layouts.app')

@section('contenido')
    {{--
 <div class="container">
     <div class="card">
         <div class="card-header d-flex justify-content-between">
             <h2>Lista de Aprendices</h2>
             <a href="{{ route('Aprendiz.create') }}" class="btn btn-primary" style="background-color: #39a900; border: none;">Nuevo Aprendiz</a>
         </div>
         <div class="card-body">
             <table class="table table-striped">
                 <thead>
                 <tr>
                     <th>Documento</th>
                     <th>Nombres y Apellidos</th>
                     <th>Correo</th>
                     <th>Teléfono</th>
                     <th>Acciones</th>
                 </tr>
                 </thead>
                 <tbody>
                 @foreach($aprendices as $item)
                     <tr>
                         <td>{{ $item->Tdoc }} {{ $item->Numdoc }}</td>
                         <td>{{ $item->Nombres }} {{ $item->Apellidos }}</td>
                         <td>{{ $item->CorreoInstitucional }}</td>
                         <td>{{ $item->Telefono }}</td>
                         <td>
                             <button class="btn btn-sm btn-info">Ver</button>
                         </td>
                     </tr>
                 @endforeach
                 </tbody>
             </table>
         </div>
     </div>
 </div>

--}}


    <h2>Lista de Aprendices</h2>

    <div style="margin-bottom: 20px;">
        <form action="{{ route('Aprendiz.index') }}" method="GET">
            <input type="text" name="buscar" value="{{ $buscar }}" placeholder="Documento o Nombre...">
            <button type="submit" style="background: #39a900; color: white; border: none; padding: 5px 15px;">Consultar</button>
        </form>
    </div>

    <div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
        <a href="{{ route('Aprendiz.create') }}"
           style="background: #39a900; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-weight: bold;">
            + Crear Nuevo
        </a>
    </div>

    <table>
        <thead>
        <tr>
            <th>T. Documento</th>
            <th>Documento</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Correo Institucional</th>
            <th>Correo Personal</th>
            <th>Sexo</th>
            <th>Fecha de Nacimiento</th>
            <th>Acciones</th>
            <th style="text-align: center;">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($aprendices as $item)
            <tr>
                <td>{{ $item->Tdoc }}</td>
                <td>{{ $item->Numdoc }}</td>
                <td>{{ $item->Nombres }}</td>
                <td>{{ $item->Apellidos }}</td>
                <td>{{ $item->Direccion }}</td>
                <td>{{ $item->Telefono }}</td>
                <td>{{ $item->CorreoInstitucional }}</td>
                <td>{{ $item->CorreoPersonal }}</td>
                <td>{{ $item->Sexo }}</td>
                <td>{{ $item->FechaNac }}</td>
                <td style="text-align: center;">
                    <form action="{{ route('Aprendiz.destroy', $item->NIS) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete"
                                onclick="return confirm('¿Deseas eliminar este aprendiz?')">
                            Eliminar
                        </button>

                        <a href="{{ route('Aprendiz.edit', $a->NIS) }}" style="color: #39a900;">Editar</a>

                    </form>
                </td>
            </tr>
        @endforeach

@endsection
