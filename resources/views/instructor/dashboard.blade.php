@extends('layouts.app')

@section('contenido')
    <div class="container mt-4">
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="fw-bold"><i class="fas fa-chalkboard-teacher me-2 text-sena"></i>Panel de Instructor</h2>
                <p class="text-muted">Gestión y seguimiento de aprendices en etapa productiva.</p>
            </div>
        </div>

        {{-- TARJETAS DE ESTADÍSTICAS --}}
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm bg-sena text-white p-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-users fa-3x opacity-50 me-3"></i>
                        <div>
                            <h3 class="mb-0 fw-bold">{{ $aprendices->count() }}</h3>
                            <span>Aprendices a Cargo</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm bg-warning text-dark p-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-clock fa-3x opacity-50 me-3"></i>
                        <div>
                            <h3 class="mb-0 fw-bold">{{ $pendientes }}</h3>
                            <span>Bitácoras por Revisar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- LISTA DE APRENDICES --}}
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-dark">Mis Aprendices</h5>
            </div>
            <div class="table-responsive p-3">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                    <tr class="small text-uppercase">
                        <th>Documento</th>
                        <th>Nombre Completo</th>
                        <th>Empresa</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($aprendices as $aprendiz)
                        <tr>
                            <td class="fw-bold">{{ $aprendiz->Numdoc }}</td>
                            <td>{{ $aprendiz->Nombres }} {{ $aprendiz->Apellidos }}</td>
                            <td>
        <span class="badge bg-light text-dark border">
            {{ $aprendiz->empresa ?? 'Sin empresa' }} {{-- <--- Aquí debe decir $aprendiz->empresa --}}
        </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('instructor.seguimiento', $aprendiz->NIS) }}"
                                   class="btn btn-sena btn-sm text-white px-3">
                                    <i class="fas fa-eye me-1"></i> Ver Seguimiento
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .bg-sena { background-color: #39a900; }
        .text-sena { color: #39a900; }
        .btn-sena { background-color: #39a900; border: none; }
        .btn-sena:hover { background-color: #2d8500; }
    </style>
@endsection
