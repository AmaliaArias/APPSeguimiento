@extends('layouts.app')

@section('contenido')
    <div class="card-custom shadow-sm p-4 bg-white rounded-4">

        {{-- Encabezado --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fw-bold text-dark mb-1">Lista de Fichas de Caracterización</h1>
                <p class="text-muted small">Gestión de grupos y programas de formación</p>
            </div>
            <a href="{{ route('Fichasdecaracterizacion.create') }}" class="btn btn-sena shadow-sm px-4">
                <i class="fas fa-plus-circle me-1"></i> Crear Nuevo
            </a>
        </div>

        {{-- Barra de búsqueda --}}
        <div class="bg-light p-3 rounded-3 mb-4 border shadow-sm">
            <form action="{{ route('Fichasdecaracterizacion.index') }}" method="GET" class="row g-2 align-items-center">
                <div class="col-md-6">
                    <input type="text" name="buscar" value="{{ $buscar }}" class="form-control" placeholder="Buscar por Código, Denominación o Instructor...">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-sena">Consultar</button>
                </div>
                <div class="col-auto">
                    <a href="{{ route('Fichasdecaracterizacion.index') }}" class="btn btn-outline-secondary">Limpiar</a>
                </div>
            </form>
        </div>

        {{-- Tabla Responsiva --}}
        <div class="table-responsive rounded-3 border">
            <table class="table table-hover align-middle mb-0" style="min-width: 1450px;">
                <thead class="table-light">
                <tr class="text-sena small text-uppercase fw-bold">
                    <th>Código</th>
                    <th>Denominación</th>
                    <th>Centro de Formación</th>
                    <th>Programa</th>
                    <th>Instructor</th>
                    <th class="text-center">Cupo</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Observaciones</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                {{-- CAMBIO: Usamos $fichas que viene del controlador --}}
                @forelse($fichas as $ficha)
                    <tr>
                        <td class="fw-bold text-dark">{{ $ficha->Codigo }}</td>
                        <td>{{ $ficha->Denominacion }}</td>
                        <td><small class="text-muted">{{ $ficha->centro->Denominacion ?? 'No asignado' }}</small></td>
                        <td><span class="text-sena small fw-bold">{{ $ficha->programa->Denominacion ?? 'No asignado' }}</span></td>

                        <td>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-user-tie text-muted me-2"></i>
                                <span class="small fw-bold">
                                    {{ $ficha->instructor->Nombres ?? 'Sin' }} {{ $ficha->instructor->Apellidos ?? 'asignar' }}
                                </span>
                            </div>
                        </td>

                        <td class="text-center">
                            <span class="badge bg-light text-dark border px-3">{{ $ficha->Cupo }}</span>
                        </td>
                        <td><small>{{ $ficha->FechaInicio }}</small></td>
                        <td><small>{{ $ficha->FechaFin }}</small></td>
                        <td>
                            <p class="mb-0 small text-truncate" style="max-width: 150px;" title="{{ $ficha->Observaciones }}">
                                {{ $ficha->Observaciones }}
                            </p>
                        </td>
                        <td class="text-center">
                            <div class="btn-group shadow-sm" role="group">
                                <a href="{{ route('Fichasdecaracterizacion.show', $ficha->NIS) }}" class="btn btn-sm btn-info text-white" title="Ver Detalle">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('Fichasdecaracterizacion.edit', $ficha->NIS) }}" class="btn btn-sm btn-warning text-dark" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('Fichasdecaracterizacion.destroy', $ficha->NIS) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Deseas eliminar esta Ficha?')" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    {{-- Esto se muestra si NO hay resultados en la búsqueda --}}
                    <tr>
                        <td colspan="10" class="text-center py-5">
                            <i class="fas fa-search fa-3x text-muted mb-3 d-block"></i>
                            <span class="text-muted">No se encontraron fichas que coincidan con <strong>"{{ $buscar }}"</strong></span>
                        </td>
                    </tr>
                @endforelse
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

        .table thead th { border-top: none; }
    </style>
@endsection
