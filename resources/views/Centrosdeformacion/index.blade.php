@extends('layouts.app')

@section('contenido')
    <div class="card shadow-sm border-0 p-4" style="border-radius: 15px;"> {{-- Contenedor de tarjeta unificado --}}

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark">Lista de Centros de Formación</h2>
            <a href="{{ route('Centrosdeformacion.create') }}" class="btn btn-success px-4 fw-bold shadow-sm" style="background-color: #39a900; border: none;">
                <i class="fas fa-plus-circle me-1"></i> + Crear Nuevo
            </a>
        </div>

        {{-- Barra de búsqueda (Estilo unificado con Tipos de Documentos) --}}
        <div class="bg-light p-3 rounded mb-4 border shadow-sm">
            <form action="{{ route('Centrosdeformacion.index') }}" method="GET" class="row g-2">
                <div class="col-md-6">
                    <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted">
                        <i class="fas fa-search"></i>
                    </span>
                        <input type="text" name="buscar" value="{{ $buscar }}"
                               class="form-control border-start-0 shadow-none"
                               placeholder="Buscar por Nombre...">
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success px-4" style="background-color: #39a900; border: none;">Consultar</button>
                </div>
                <div class="col-auto">
                    <a href="{{ route('Centrosdeformacion.index') }}" class="btn btn-secondary px-3">Limpiar</a>
                </div>
            </form>
        </div>

        {{-- Tabla Responsiva con todos tus campos originales --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle border">
                <thead class="table-light">
                <tr class="text-secondary small">
                    <th>Código</th>
                    <th>Denominación</th>
                    <th>Dirección</th>
                    <th>Observaciones</th>
                    <th>Ficha Asociada</th>
                    <th>Regional</th>
                    <th class="text-center" width="160">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($centros as $item)
                    <tr>
                        <td class="fw-bold text-dark">{{ $item->Codigo }}</td>
                        <td>{{ $item->Denominacion }}</td>
                        <td class="small">{{ $item->Direccion }}</td>
                        <td class="text-muted small">{{ $item->Observaciones }}</td>
                        {{-- Mantenemos tu lógica de relaciones --}}
                        <td class="small">
                            {{ $item->ficha->Codigo ?? 'N/A' }} - {{ $item->ficha->Denominacion ?? '' }}
                        </td>
                        <td class="small text-success fw-bold">
                            {{ $item->regional->Denominacion ?? 'Sin asignar' }}
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                {{-- Botones de Iconos (Igual a Tipos de Documentos y Roles) --}}
                                <a href="{{ route('Centrosdeformacion.show', $item->NIS) }}"
                                   class="btn btn-sm btn-info text-white shadow-sm" title="Ver Detalle">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('Centrosdeformacion.edit', $item->NIS) }}"
                                   class="btn btn-sm btn-warning text-dark shadow-sm" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('Centrosdeformacion.destroy', $item->NIS) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm"
                                            onclick="return confirm('¿Deseas eliminar este Centro de Formación?')">
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
