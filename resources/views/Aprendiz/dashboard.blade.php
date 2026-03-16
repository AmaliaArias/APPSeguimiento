@extends('layouts.app')

@section('contenido')
    <div class="container mt-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark">Panel de Seguimiento de Etapa Productiva</h2>
            <p class="text-muted">Bienvenido, Aprendiz SENA</p>
        </div>

        <div class="card shadow-sm border-0 rounded-4 p-4 mb-5">
            <h5 class="fw-bold"><i class="fas fa-chart-line me-2 text-sena"></i>Mi Progreso Total</h5>
            <div class="progress mt-3" style="height: 25px; border-radius: 20px;">
                <div class="progress-bar bg-sena progress-bar-striped progress-bar-animated"
                     role="progressbar" style="width: {{ $porcentaje }}%">
                    {{ round($porcentaje) }}%
                </div>
            </div>
            <small class="text-muted mt-2">Has completado {{ $aprobadas }} de 12 bitácoras.</small>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-card text-center p-3">
                    <div class="card-body">
                        <i class="fas fa-file-signature fa-3x text-sena mb-3"></i>
                        <h5 class="fw-bold">Registrar Práctica</h5>
                        <p class="small text-muted">Inicia el registro de tu empresa y jefe inmediato.</p>
                        {{-- Cambiamos el href por la ruta creada --}}
                        <a href="{{ route('practica.create') }}" class="btn btn-sena btn-sm text-white px-4">Ingresar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-card text-center p-3">
                    <div class="card-body">
                        <i class="fas fa-user-tie fa-3x text-sena mb-3"></i>
                        <h5 class="fw-bold">Mi Instructor</h5>
                        <p class="small text-muted">Consulta quién es tu instructor de seguimiento.</p>
                        <a href="#" class="btn btn-sena btn-sm text-white px-4">Consultar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-card text-center p-3">
                    <div class="card-body">
                        <i class="fas fa-file-excel fa-3x text-success mb-3"></i>
                        <h5 class="fw-bold">Formato Bitácora</h5>
                        <p class="small text-muted">Descarga el archivo Excel oficial para llenar.</p>
                        <a href="/formatos/bitacora/FormatoBitacoraSeguimientoEtapaProductiva.xlsx" class="btn btn-outline-success btn-sm px-4">Descargar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm hover-card text-center p-3 border-start border-sena border-5">
                    <div class="card-body">
                        <i class="fas fa-cloud-upload-alt fa-3x text-sena mb-3"></i>
                        <h5 class="fw-bold">Gestionar Bitácoras</h5>
                        <p class="small text-muted">Carga tus bitácoras quincenales y revisa el estado.</p>
                        <a href="{{ route('Bitacoras.index') }}" class="btn btn-sena text-white px-5">Cargar Documentos</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm hover-card text-center p-3">
                    <div class="card-body">
                        <i class="fas fa-book fa-3x text-secondary mb-3"></i>
                        <h5 class="fw-bold">Guía de Carga</h5>
                        <p class="small text-muted">Aprende cómo subir tus documentos correctamente.</p>
                        <a href="#" class="btn btn-secondary btn-sm px-4">Ver Guía</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .text-sena { color: #39a900; }
        .bg-sena { background-color: #39a900; }
        .btn-sena { background-color: #39a900; border: none; }
        .btn-sena:hover { background-color: #2d8500; }
        .hover-card { transition: transform 0.3s ease, shadow 0.3s ease; border-radius: 15px; }
        .hover-card:hover { transform: translateY(-10px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
    </style>
@endsection
