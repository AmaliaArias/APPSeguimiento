@extends('layouts.app')

@section('contenido')
    <div class="card-custom"> {{-- Usamos el contenedor con sombra y bordes redondeados --}}

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark">Lista de Tipos de Documentos</h2>
            <a href="{{ route('Tiposdocumentos.create') }}" class="btn btn-sena shadow-sm">
                <i class="fas fa-plus-circle me-1"></i> + Crear Nuevo
            </a>
        </div>

        {{-- Barra de búsqueda estilizada --}}
        <div class="bg-light p-3 rounded mb-4 shadow-sm border">
            <form action="{{ route('Tiposdocumentos.index') }}" method="GET" class="row g-2">
                <div class="col-md-6">
                    <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted">
                        <i class="fas fa-search"></i>
                    </span>
                        <input type="text" name="buscar" value="{{ $buscar }}"
                               class="form-control border-start-0"
                               placeholder="Buscar por NIS o Denominación...">
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-sena px-4">Consultar</button>
                </div>
                <div class="col-auto">
                    <a href="{{ route('Tiposdocumentos.index') }}" class="btn btn-secondary px-3">
                        <i class="fas fa-eraser"></i> Limpiar
                    </a>
                </div>
            </form>
        </div>

        {{-- Tabla con diseño moderno --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle border">
                <thead class="table-light">
                <tr class="text-secondary">
                    <th width="80">NIS</th>
                    <th>Denominación</th>
                    <th>Observaciones</th>
                    <th class="text-center" width="180">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tiposdocumentos as $tipodocumento)
                    <tr>
                        <td class="fw-bold">{{ $tipodocumento->NIS }}</td>
                        <td>{{ $tipodocumento->Denominacion }}</td>
                        <td class="text-muted">{{ $tipodocumento->Observaciones }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                {{-- Ver Detalle --}}
                                <a href="{{ route('Tiposdocumentos.show', $tipodocumento->NIS) }}"
                                   class="btn btn-sm btn-info text-white shadow-sm" title="Ver Detalle">
                                    <i class="fas fa-eye"></i>
                                </a>

                                {{-- Editar --}}
                                <a href="{{ route('Tiposdocumentos.edit', $tipodocumento->NIS) }}"
                                   class="btn btn-sm btn-warning text-dark shadow-sm" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- Eliminar --}}
                                <form action="{{ route('Tiposdocumentos.destroy', $tipodocumento->NIS) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm"
                                            onclick="return confirm('¿Deseas eliminar este Tipo de Documento?')"
                                            title="Eliminar">
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
@endsection
