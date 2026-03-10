@extends('layouts.app')

@section('contenido')
    <div class="card-custom shadow-sm p-4 bg-white rounded-4">

        {{-- Encabezado --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fw-bold text-dark mb-1">Lista de EPS</h1>
                <p class="text-muted small">Gestión de Entidades Promotoras de Salud</p>
            </div>
            <a href="{{ route('Eps.create') }}" class="btn btn-sena shadow-sm px-4">
                <i class="fas fa-plus-circle me-1"></i> Crear Nuevo
            </a>
        </div>

        {{-- Barra de búsqueda estilizada --}}
        <div class="bg-light p-3 rounded-3 mb-4 border shadow-sm">
            <form action="{{ route('Eps.index') }}" method="GET" class="row g-2 align-items-center">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
                        <input type="text" name="buscar" value="{{ $buscar }}" class="form-control border-start-0" placeholder="Buscar por Nombre o Documento...">
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-sena px-4">Consultar</button>
                </div>
                <div class="col-auto">
                    <a href="{{ route('Eps.index') }}" class="btn btn-outline-secondary">Limpiar</a>
                </div>
            </form>
        </div>

        {{-- Tabla Responsiva Profesional --}}
        <div class="table-responsive rounded-3 border">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                <tr class="text-sena small text-uppercase fw-bold">
                    <th style="width: 200px;">Número de Documento</th>
                    <th>Denominación de la EPS</th>
                    <th>Observaciones</th>
                    <th class="text-center" style="width: 180px;">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse($eps as $item)
                    <tr>
                        <td class="fw-bold text-dark">{{ $item->Numdoc }}</td>
                        <td class="text-sena fw-bold text-uppercase">{{ $item->Denominacion }}</td>
                        <td>
                            <p class="mb-0 small text-muted text-truncate" style="max-width: 350px;" title="{{ $item->Observaciones }}">
                                {{ $item->Observaciones ?: 'Sin observaciones registradas' }}
                            </p>
                        </td>
                        <td class="text-center">
                            <div class="btn-group shadow-sm" role="group">
                                {{-- Ver --}}
                                <a href="{{ route('Eps.show', $item->NIS) }}" class="btn btn-sm btn-outline-info" title="Ver Detalle">
                                    <i class="fas fa-eye"></i>
                                </a>

                                {{-- Editar --}}
                                <a href="{{ route('Eps.edit', $item->NIS) }}" class="btn btn-sm btn-outline-warning text-dark" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- Eliminar --}}
                                <form action="{{ route('Eps.destroy', $item->NIS) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Deseas eliminar esta EPS?')" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-5">
                            <i class="fas fa-hospital-alt fa-3x text-muted mb-3 d-block"></i>
                            <span class="text-muted">No se encontraron EPS con el término <strong>"{{ $buscar }}"</strong></span>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .text-sena { color: #39a900; }
        .btn-sena { background-color: #39a900; color: white; border: none; font-weight: bold; transition: 0.3s; }
        .btn-sena:hover { background-color: #2d8500; color: white; transform: translateY(-2px); }

        .table-hover tbody tr:hover { background-color: rgba(57, 169, 0, 0.02); }
        .btn-group .btn { padding: 0.4rem 0.8rem; }
        .card-custom { border-radius: 1rem; }
    </style>
@endsection
