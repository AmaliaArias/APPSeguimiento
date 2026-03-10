@extends('layouts.app')

@section('contenido')
    <div class="card-custom shadow-sm p-4 bg-white rounded-4">

        {{-- Encabezado Estilo Instructor --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fw-bold text-dark mb-1">Lista de Aprendices</h1>
                <p class="text-muted small">Administración detallada de registros de formación</p>
            </div>
            <a href="{{ route('Aprendiz.create') }}" class="btn btn-sena shadow-sm px-4">
                <i class="fas fa-plus-circle me-1"></i> Registrar Nuevo
            </a>
        </div>

        {{-- Barra de búsqueda --}}
        <div class="bg-light p-3 rounded-3 mb-4 border shadow-sm">
            <form action="{{ route('Aprendiz.index') }}" method="GET" class="row g-2 align-items-center">
                <div class="col-md-6">
                    <input type="text" name="buscar" value="{{ $buscar }}" class="form-control" placeholder="Buscar por Nombre, documento...">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-sena px-4">Consultar</button>
                </div>
                <div class="col-auto">
                    <a href="{{ route('Aprendiz.index') }}" class="btn btn-outline-secondary">Limpiar</a>
                </div>
            </form>
        </div>

        {{-- Tabla Responsiva con campos exactos de tu DB --}}
        <div class="table-responsive rounded-3 border">
            <table class="table table-hover align-middle mb-0" style="min-width: 1600px;">
                <thead class="table-light">
                <tr class="text-sena small text-uppercase fw-bold">
                    <th>T. Documento</th>
                    <th>Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Ficha</th> {{-- Nuevo campo según tu DB --}}
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo Institucional</th>
                    <th>Sexo</th>
                    <th>EPS</th> {{-- Nuevo campo según tu DB --}}
                    <th>Fecha Nac.</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($aprendices as $item)
                    <tr>
                        {{-- Relación con tbl_tiposdocumentos_NIS --}}
                        <td>{{ $item->tipoDocumento->Denominacion ?? 'ID: '.$item->Tdoc }}</td>

                        <td class="fw-bold text-dark">{{ $item->Numdoc }}</td>
                        <td>{{ $item->Nombres }}</td>
                        <td>{{ $item->Apellidos }}</td>

                        {{-- Relación con tbl_fichasdecaracterizacion_NIS --}}
                        <td>
                            <span class="badge bg-light text-dark border">
                                <i class="fas fa-id-card me-1 text-sena"></i>
                                {{ $item->ficha->Codigo ?? 'Sin Ficha' }}
                            </span>
                        </td>

                        <td><small class="text-muted">{{ Str::limit($item->Direccion, 25) }}</small></td>
                        <td>{{ $item->Telefono }}</td>
                        <td><span class="text-sena small fw-bold">{{ $item->CorreoInstitucional }}</span></td>

                        {{-- Sexo (asumiendo 1=M, 0=F según tu lógica de Instructor) --}}
                        <td>
                            @if($item->Sexo == 1) <span class="text-primary"><i class="fas fa-mars"></i> M</span>
                            @elseif($item->Sexo == 0) <span class="text-danger"><i class="fas fa-venus"></i> F</span>
                            @else {{ $item->Sexo }}
                            @endif
                        </td>

                        {{-- Relación con tbl_eps_NIS --}}
                        <td><small class="fw-bold">{{ $item->eps->Denominacion ?? 'N/A' }}</small></td>

                        <td>{{ $item->FechaNac }}</td>

                        <td class="text-center">
                            <div class="btn-group shadow-sm" role="group">
                                <a href="{{ route('Aprendiz.show', $item->NIS) }}" class="btn btn-sm btn-info text-white" title="Ver Detalle">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('Aprendiz.edit', $item->NIS) }}" class="btn btn-sm btn-warning text-dark" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('Aprendiz.destroy', $item->NIS) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Deseas eliminar este Aprendiz?')" title="Eliminar">
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
        .btn-sena { background-color: #39a900; color: white; border: none; font-weight: bold; }
        .btn-sena:hover { background-color: #2d8500; color: white; }
        .table-hover tbody tr:hover { background-color: rgba(57, 169, 0, 0.05); }
        .table-responsive::-webkit-scrollbar { height: 8px; }
        .table-responsive::-webkit-scrollbar-thumb { background: #39a900; border-radius: 10px; }
    </style>
@endsection
