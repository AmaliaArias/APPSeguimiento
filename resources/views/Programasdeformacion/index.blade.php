@extends('layouts.app')

@section('contenido')
    <div class="card shadow-sm border-0 p-4" style="border-radius: 15px;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark">Programas de Formación</h2>
            <a href="{{ route('programasdeformacion.create') }}" class="btn btn-success px-4 fw-bold shadow-sm" style="background-color: #39a900; border: none;">
                <i class="fas fa-plus-circle me-1"></i> + Crear Nuevo
            </a>
        </div>

        {{-- Barra de búsqueda unificada --}}
        <div class="bg-light p-3 rounded mb-4 border">
            <form action="{{ route('programasdeformacion.index') }}" method="GET" class="row g-2">
                <div class="col-md-6">
                    <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted">
                        <i class="fas fa-search"></i>
                    </span>
                        <input type="text" name="buscar" value="{{ $buscar }}" class="form-control border-start-0" placeholder="Buscar por Código o Denominación...">
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success px-4" style="background-color: #39a900; border: none;">Consultar</button>
                </div>
                <div class="col-auto">
                    <a href="{{ route('programasdeformacion.index') }}" class="btn btn-secondary px-3">Limpiar</a>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle border">
                <thead class="table-light">
                <tr class="text-secondary">
                    <th width="120">Código</th>
                    <th>Denominación</th>
                    <th>Observaciones</th>
                    <th class="text-center" width="160">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($programas as $programa)
                    <tr>
                        <td class="fw-bold text-dark">{{ $programa->Codigo }}</td>
                        <td>{{ $programa->Denominacion }}</td>
                        <td class="text-muted small">{{ $programa->Observaciones }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                {{-- BOTONES DE ICONOS (Igual a Tipos de Documentos) --}}
                                <a href="{{ route('programasdeformacion.show', $programa->NIS) }}"
                                   class="btn btn-sm btn-info text-white shadow-sm" title="Ver Detalle">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('programasdeformacion.edit', $programa->NIS) }}"
                                   class="btn btn-sm btn-warning text-dark shadow-sm" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('programasdeformacion.destroy', $programa->NIS) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm"
                                            onclick="return confirm('¿Deseas eliminar este programa?')">
                                        <i class="fas fa-trash"></i>
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
