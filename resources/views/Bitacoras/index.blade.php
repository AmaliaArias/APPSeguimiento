@extends('layouts.app')

@section('contenido')
    <div class="card shadow-sm p-4 bg-white rounded-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fw-bold text-dark mb-1">Mis Bitácoras de Seguimiento</h1>
                <p class="text-muted small">Seguimiento quincenal de la etapa productiva</p>
            </div>

            {{-- BOTÓN DINÁMICO --}}
            @if($habilitarSiguiente)
                <a href="{{ route('Bitacoras.create') }}" class="btn btn-sena shadow-sm px-4 text-white">
                    <i class="fas fa-plus-circle me-1"></i> Nueva Bitácora #{{ $siguienteNumero }}
                </a>
            @else
                <div class="alert alert-warning border-0 shadow-sm mb-0 py-2 px-3 small d-flex align-items-center">
                    <i class="fas fa-lock me-2"></i>
                    <span>{{ $mensajeBloqueo }}</span>
                </div>
            @endif
        </div>

        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm">{{ session('success') }}</div>
        @endif

        <div class="table-responsive rounded-3 border">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                <tr class="text-sena small text-uppercase fw-bold">
                    <th>#</th>
                    <th>Periodo</th>
                    <th>Estado</th>
                    <th>Evidencia</th>
                    <th>Observaciones</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse($bitacoras as $bitacora)
                    <tr>
                        <td class="fw-bold text-sena">{{ $bitacora->numero_bitacora }}</td>
                        <td>
                            <small class="d-block text-dark fw-bold">{{ $bitacora->fechainicio }}</small>
                            <small class="text-muted">hasta {{ $bitacora->fechafin }}</small>
                        </td>
                        <td>
                            @if($bitacora->estado == 'Pendiente')
                                <span class="badge bg-warning text-dark"><i class="fas fa-clock me-1"></i>En Revisión</span>
                            @elseif($bitacora->estado == 'Aprobada')
                                <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i>Aprobada</span>
                            @else
                                <span class="badge bg-danger"><i class="fas fa-times-circle me-1"></i>Rechazada</span>
                            @endif
                        </td>
                        <td>
                            @if($bitacora->evidencias)
                                <a href="{{ asset('storage/' . $bitacora->evidencias) }}" target="_blank" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-file-pdf"></i> PDF
                                </a>
                            @else
                                <span class="text-muted small italic">Sin archivo</span>
                            @endif
                        </td>
                        <td>
                            <p class="mb-0 small text-truncate" style="max-width: 150px;">
                                {{ $bitacora->observaciones_instructor ?? 'Sin comentarios' }}
                            </p>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                @if($bitacora->estado != 'Aprobada')
                                    <a href="{{ route('Bitacoras.edit', $bitacora->id) }}" class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endif
                                <button class="btn btn-sm btn-light border"><i class="fas fa-search"></i></button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <i class="fas fa-folder-open fa-3x text-muted mb-3 d-block"></i>
                            <span class="text-muted">No has registrado bitácoras aún.</span>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .text-sena { color: #39a900; }
        .btn-sena { background-color: #39a900; border: none; }
        .btn-sena:hover { background-color: #2d8500; }
    </style>
@endsection
