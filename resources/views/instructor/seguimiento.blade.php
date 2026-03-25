@extends('layouts.app')

@section('contenido')
    <div class="container mt-4">
        {{-- Encabezado con datos del aprendiz --}}
        <div class="card shadow-sm border-0 mb-4 rounded-4">
            <div class="card-body d-flex align-items-center p-4">
                <div class="bg-sena text-white rounded-circle p-3 me-3">
                    <i class="fas fa-user-graduate fa-2x"></i>
                </div>
                <div>
                    <h3 class="fw-bold mb-0">{{ $aprendiz->Nombres }} {{ $aprendiz->Apellidos }}</h3>
                    <p class="text-muted mb-0">Documento: {{ $aprendiz->Numdoc }} | Seguimiento de Etapa Productiva</p>
                </div>
                <div class="ms-auto">
                    <a href="{{ route('instructor.dashboard') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Volver al Panel
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-book me-2 text-sena"></i>Control de Bitácoras</h5>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table table-hover align-middle">
                            <thead class="table-light text-uppercase small">
                            <tr>
                                <th>N°</th>
                                <th>Periodo</th>
                                <th>Estado</th>
                                <th>Evidencia</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($bitacoras as $bitacora)
                                <tr>
                                    <td class="fw-bold text-sena">{{ $bitacora->numero_bitacora }}</td>
                                    <td>
                                        <span class="small">{{ $bitacora->fechainicio }} a {{ $bitacora->fechafin }}</span>
                                    </td>
                                    <td>
                                        @if($bitacora->estado == 'Pendiente')
                                            <span class="badge bg-warning text-dark">Pendiente de Revisión</span>
                                        @elseif($bitacora->estado == 'Aprobada')
                                            <span class="badge bg-success">Aprobada</span>
                                        @else
                                            <span class="badge bg-danger">No Aprobada</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($bitacora->evidencias)
                                            <a href="{{ asset('storage/' . $bitacora->evidencias) }}" target="_blank" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-file-pdf me-1"></i> Ver PDF
                                            </a>
                                        @else
                                            <span class="text-muted small">Sin archivo</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Botón para abrir el formulario de calificación --}}
                                        <button class="btn btn-sena btn-sm text-white px-3" data-bs-toggle="modal" data-bs-target="#modalCalificar{{ $bitacora->id }}">
                                            <i class="fas fa-check-double me-1"></i> Calificar
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        El aprendiz no ha cargado bitácoras todavía.
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Estilos personalizados --}}
    <style>
        .bg-sena { background-color: #39a900; }
        .text-sena { color: #39a900; }
        .btn-sena { background-color: #39a900; border: none; }
        .btn-sena:hover { background-color: #2d8500; }
    </style>


    {{-- Modales para calificar cada bitácora --}}
    @foreach($bitacoras as $bitacora)
        <div class="modal fade" id="modalCalificar{{ $bitacora->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-4 border-0 shadow">
                    <div class="modal-header bg-sena text-white">
                        <h5 class="modal-title">Calificar Bitácora #{{ $bitacora->numero_bitacora }}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('instructor.calificar', $bitacora->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body p-4">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Estado de la Bitácora</label>
                                <select name="estado" class="form-select border-sena" required>
                                    <option value="Aprobada" {{ $bitacora->estado == 'Aprobada' ? 'selected' : '' }}>Aprobar ✅</option>
                                    <option value="Rechazada" {{ $bitacora->estado == 'Rechazada' ? 'selected' : '' }}>No Aprobada (Rechazar) ❌</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Observaciones del Instructor</label>
                                <textarea name="observaciones_instructor" class="form-control" rows="4"
                                          placeholder="Escribe aquí las correcciones o felicitaciones...">{{ $bitacora->observaciones_instructor }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-sena text-white px-4">Guardar Calificación</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
