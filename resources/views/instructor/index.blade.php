@extends('layouts.app')

@section('contenido')
    <div class="card-custom shadow-sm p-4 bg-white rounded-4">

        {{-- Encabezado --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fw-bold text-dark mb-1">Lista de Instructores</h1>
                <p class="text-muted small">Administración detallada de registros</p>
            </div>
            <a href="{{ route('instructor.create') }}" class="btn btn-sena shadow-sm px-4">
                <i class="fas fa-plus-circle me-1"></i> Crear Nuevo
            </a>
        </div>

        {{-- Barra de búsqueda --}}
        <div class="bg-light p-3 rounded-3 mb-4 border shadow-sm">
            <form action="{{ route('instructor.index') }}" method="GET" class="row g-2 align-items-center">
                <div class="col-md-6">
                    <input type="text" name="buscar" value="{{ $buscar }}" class="form-control" placeholder="Buscar por Nombre, documento...">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-sena">Consultar</button>
                </div>
                <div class="col-auto">
                    <a href="{{ route('instructor.index') }}" class="btn btn-outline-secondary">Limpiar</a>
                </div>
            </form>
        </div>

        {{-- Tabla Responsiva --}}
        <div class="table-responsive rounded-3 border">
            <table class="table table-hover align-middle mb-0" style="min-width: 1500px;">
                <thead class="table-light">
                <tr class="text-sena small text-uppercase fw-bold">
                    <th>T. Documento</th>
                    <th>Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo Institucional</th>
                    <th>Correo Personal</th>
                    <th>Sexo</th>
                    <th>Fecha Nac.</th>
                    <th>Rol Admin.</th>
                    <th>EPS</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($instructores as $item)
                    <tr>
                        {{-- Muestra la Denominación del tipo de documento en lugar del NIS --}}
                        <td>{{ $item->tipoDocumento->Denominacion ?? $item->Tdoc }}</td>

                        <td class="fw-bold">{{ $item->Numdoc }}</td>
                        <td>{{ $item->Nombres }}</td>
                        <td>{{ $item->Apellidos }}</td>
                        <td><small class="text-muted">{{ $item->Direccion }}</small></td>
                        <td>{{ $item->Telefono }}</td>
                        <td><span class="text-sena small">{{ $item->CorreoInstitucional }}</span></td>
                        <td class="text-muted small">{{ $item->CorreoPersonal }}</td>

                        {{-- Muestra Masculino o Femenino en lugar de 1 o 0 --}}
                        <td>
                            @if($item->Sexo == 1) Masculino
                            @elseif($item->Sexo == 0) Femenino
                            @else {{ $item->Sexo }}
                            @endif
                        </td>

                        <td>{{ $item->FechaNac }}</td>

                        {{-- Muestra el nombre del Rol en lugar del número (NIS) --}}
                        <td>
                            <span class="badge bg-success text-white">
                                {{ $item->rol->Denominacion ?? 'Sin Rol' }}
                            </span>
                        </td>

                        {{-- Muestra el nombre de la EPS en lugar del número (NIS) --}}
                        <td>{{ $item->eps->Denominacion ?? 'Sin EPS' }}</td>

                        <td class="text-center">
                            <div class="btn-group shadow-sm" role="group">
                                <a href="{{ route('instructor.show', $item->NIS) }}" class="btn btn-sm btn-info text-white" title="Ver Detalle">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('instructor.edit', $item->NIS) }}" class="btn btn-sm btn-warning text-dark" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('instructor.destroy', $item->NIS) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Deseas eliminar este Instructor?')" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .text-sena { color: #39a900; }
        .btn-sena { background-color: #39a900; color: white; border: none; }
        .btn-sena:hover { background-color: #2d8500; color: white; }

        .table-responsive::-webkit-scrollbar { height: 8px; }
        .table-responsive::-webkit-scrollbar-thumb { background: #39a900; border-radius: 10px; }
    </style>
@endsection
