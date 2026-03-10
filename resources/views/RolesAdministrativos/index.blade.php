@extends('layouts.app')

@section('contenido')
    <div class="card-custom">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold text-dark">Lista de Roles Administrativos</h1>
            <a href="{{ route('Rolesadministrativos.create') }}" class="btn btn-sena shadow-sm">
                <i class="fas fa-plus-circle me-1"></i> Crear Nuevo
            </a>
        </div>

        {{-- Barra de búsqueda --}}
        <div class="bg-light p-3 rounded mb-4 shadow-sm">
            <form action="{{ route('Rolesadministrativos.index') }}" method="GET" class="row g-2">
                <div class="col-md-6">
                    <input type="text" name="buscar" value="{{ $buscar }}" class="form-control" placeholder="Buscar por Nombre o Descripción...">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-sena">
                        <i class="fas fa-search"></i> Consultar
                    </button>
                </div>
                <div class="col-auto">
                    <a href="{{ route('Rolesadministrativos.index') }}" class="btn btn-secondary">
                        <i class="fas fa-eraser"></i> Limpiar
                    </a>
                </div>
            </form>
        </div>

        {{-- Tabla Responsiva --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle border">
                <thead class="table-light">
                <tr class="text-sena">
                    <th>NIS</th>
                    <th>Descripción</th>
                    <th class="text-center">Anexo (PDF)</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rolesadministrativos as $rol)
                    <tr>
                        <td class="fw-bold">{{ $rol->NIS }}</td>
                        <td>{{ $rol->Descripcion }}</td>
                        <td class="text-center">


                            @if($rol->anexo_camara)
                                <a href="{{ asset('uploads/clientes/camara/' . $rol->anexo_camara) }}" target="_blank" class="btn btn-sm btn-outline-danger shadow-sm">
                                    <i class="fas fa-file-pdf"></i> Ver PDF
                                </a>
                            @else
                                <span class="badge bg-light text-muted border">Sin anexo</span>
                            @endif


                        </td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                {{-- Ver Detalle --}}
                                <a href="{{ route('Rolesadministrativos.show', $rol->NIS) }}" class="btn btn-sm btn-info text-white" title="Ver Detalle">
                                    <i class="fas fa-eye"></i>
                                </a>

                                {{-- Editar --}}
                                <a href="{{ route('Rolesadministrativos.edit', $rol->NIS) }}" class="btn btn-sm btn-warning text-dark" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- Eliminar --}}
                                <form action="{{ route('Rolesadministrativos.destroy', $rol->NIS) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Deseas eliminar este Rol Administrativo?')" title="Eliminar">
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
