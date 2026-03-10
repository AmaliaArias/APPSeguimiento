@extends('layouts.app')

@section('contenido')
    <div class="card-custom shadow-sm p-4 bg-white rounded-4">

        {{-- Encabezado --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fw-bold text-dark mb-1">Lista de Regionales</h1>
                <p class="text-muted small">Administración de sedes regionales del SENA</p>
            </div>
            <a href="{{ route('regionales.create') }}" class="btn btn-sena shadow-sm px-4">
                <i class="fas fa-plus-circle me-1"></i> Crear Nuevo
            </a>
        </div>

        {{-- Barra de búsqueda estilizada --}}
        <div class="bg-light p-3 rounded-3 mb-4 border shadow-sm">
            <form action="{{ route('Regionales.index') }}" method="GET" class="row g-2 align-items-center">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
                        <input type="text" name="buscar" value="{{ $buscar }}" class="form-control border-start-0" placeholder="Buscar por Código o Denominación...">
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-sena px-4">Consultar</button>
                </div>
                <div class="col-auto">
                    <a href="{{ route('Regionales.index') }}" class="btn btn-outline-secondary">Limpiar</a>
                </div>
            </form>
        </div>

        {{-- Tabla Responsiva --}}
        <div class="table-responsive rounded-3 border">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                <tr class="text-sena small text-uppercase fw-bold">
                    <th style="width: 150px;">Código</th>
                    <th>Denominación de la Regional</th>
                    <th>Observaciones</th>
                    <th class="text-center" style="width: 200px;">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse($regionales as $regional)
                    <tr>
                        <td class="fw-bold text-dark">{{ $regional->Codigo }}</td>
                        <td class="text-sena fw-bold text-uppercase">{{ $regional->Denominacion }}</td>
                        <td>
                            <p class="mb-0 small text-muted text-truncate" style="max-width: 300px;" title="{{ $regional->Observaciones }}">
                                {{ $regional->Observaciones ?: 'Sin observaciones' }}
                            </p>
                        </td>
                        <td class="text-center">
                            <div class="btn-group shadow-sm" role="group">
                                {{-- Ver --}}
                                <a href="{{ route('Regionales.show', $regional->NIS) }}" class="btn btn-sm btn-outline-info" title="Ver Detalle">
                                    <i class="fas fa-eye"></i>
                                </a>

                                {{-- Editar --}}
                                <a href="{{ route('Regionales.edit', $regional->NIS) }}" class="btn btn-sm btn-outline-warning text-dark" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- Eliminar --}}
                                <form action="{{ route('Regionales.destroy', $regional->NIS) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Deseas eliminar esta regional?')" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-5">
                            <i class="fas fa-map-marked-alt fa-3x text-muted mb-3 d-block"></i>
                            <span class="text-muted">No se encontraron regionales con el término <strong>"{{ $buscar }}"</strong></span>
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

        /* Efecto hover suave */
        .table-hover tbody tr:hover { background-color: rgba(57, 169, 0, 0.02); }
    </style>
@endsection
