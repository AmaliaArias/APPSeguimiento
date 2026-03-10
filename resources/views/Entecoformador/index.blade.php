@extends('layouts.app')

@section('contenido')
    <div class="card-custom shadow-sm p-4 bg-white rounded-4">

        {{-- Encabezado --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fw-bold text-dark mb-1">Lista de Entes Coformadores</h1>
                <p class="text-muted small">Gestión de empresas y entidades en convenio</p>
            </div>
            <a href="{{ route('Entecoformador.create') }}" class="btn btn-sena shadow-sm px-4">
                <i class="fas fa-plus-circle me-1"></i> Crear Nuevo
            </a>
        </div>

        {{-- Barra de búsqueda --}}
        <div class="bg-light p-3 rounded-3 mb-4 border shadow-sm">
            <form action="{{ route('Entecoformador.index') }}" method="GET" class="row g-2 align-items-center">
                <div class="col-md-6">
                    <input type="text" name="buscar" value="{{ $buscar }}" class="form-control" placeholder="Buscar por Razón Social o Documento...">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-sena px-4">Consultar</button>
                </div>
                <div class="col-auto">
                    <a href="{{ route('Entecoformador.index') }}" class="btn btn-outline-secondary">Limpiar</a>
                </div>
            </form>
        </div>

        {{-- Tabla Responsiva --}}
        <div class="table-responsive rounded-3 border">
            <table class="table table-hover align-middle mb-0" style="min-width: 1200px;">
                <thead class="table-light">
                <tr class="text-sena small text-uppercase fw-bold">
                    <th>Tipo Doc</th>
                    <th>Número</th>
                    <th>Razón Social</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse($entes as $item)
                    <tr>
                        {{-- CAMBIO AQUÍ: Llamamos a la relación para ver el nombre, no el ID --}}
                        <td class="text-uppercase small fw-bold text-muted">
                            {{ $item->tipoDocumento->Denominacion ?? 'N/A' }}
                        </td>
                        <td class="fw-bold text-dark">{{ $item->Numdoc }}</td>
                        <td class="text-sena fw-bold">{{ $item->RazonSocial }}</td>
                        <td><small>{{ $item->Direccion }}</small></td>
                        <td><small>{{ $item->Telefono }}</small></td>
                        <td>
                            <small class="text-truncate d-inline-block" style="max-width: 200px;">
                                {{ $item->CorreoInstitucional }}
                            </small>
                        </td>
                        <td class="text-center">
                            <div class="btn-group shadow-sm" role="group">
                                <a href="{{ route('Entecoformador.show', $item->NIS) }}" class="btn btn-sm btn-outline-info" title="Ver Detalle">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('Entecoformador.edit', $item->NIS) }}" class="btn btn-sm btn-outline-warning text-dark" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('Entecoformador.destroy', $item->NIS) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Deseas eliminar este Entecoformador?')" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="fas fa-search fa-3x text-muted mb-3 d-block"></i>
                            <span class="text-muted">No se encontraron resultados para <strong>"{{ $buscar }}"</strong></span>
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
    </style>
@endsection
