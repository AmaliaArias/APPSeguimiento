@extends('layouts.app')

@section('contenido')


    <div class="d-flex justify-content-between align-items-center mb-4 p-3 bg-white rounded-3 shadow-sm border-start border-4" style="border-color: #39a900 !important;">
        <div class="d-flex align-items-center">
            <div class="bg-light rounded-circle p-2 me-3">
                <i class="fas fa-user text-secondary"></i>
            </div>
            <div>
                <h5 class="mb-0 fw-bold text-dark">Hola, Amalia</h5>
                <small class="text-muted">Bienvenida al panel de control</small>
            </div>
        </div>
    </div>

    <style>
        .stat-card {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s, box-shadow 0.3s;
            background: #fff;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
        .icon-shape {
            width: 48px;
            height: 48px;
            background: #f0fdf0;
            color: #39a900;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 20px;
        }
        .quick-btn {
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            text-decoration: none;
            color: #2c3e50;
            background: white;
            border: 1px solid #eee;
            transition: 0.2s;
            display: block;
        }
        .quick-btn:hover {
            background: #39a900;
            color: white !important;
            border-color: #39a900;
        }
    </style>

    <div class="row">
        <div class="col-12 mb-4">
            <h2 class="fw-bold">Resumen del Sistema</h2>
            <p class="text-muted">Estado de registros en tiempo real</p>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card shadow-sm p-3 d-flex align-items-center">
                <div class="icon-shape me-3"><i class="fas fa-user-graduate"></i></div>
                <div>
                    <h3 class="fw-bold mb-0">{{ $totalAprendices }}</h3>
                    <small class="text-muted text-uppercase fw-bold" style="font-size: 10px;">Aprendices</small>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card shadow-sm p-3 d-flex align-items-center">
                <div class="icon-shape me-3 text-primary" style="background: #eef2ff;"><i class="fas fa-clipboard-list"></i></div>
                <div>
                    <h3 class="fw-bold mb-0">{{ $totalFichas }}</h3>
                    <small class="text-muted text-uppercase fw-bold" style="font-size: 10px;">Fichas</small>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card shadow-sm p-3 d-flex align-items-center">
                <div class="icon-shape me-3 text-warning" style="background: #fffbef;"><i class="fas fa-graduation-cap"></i></div>
                <div>
                    <h3 class="fw-bold mb-0">{{ $totalProgramas }}</h3>
                    <small class="text-muted text-uppercase fw-bold" style="font-size: 10px;">Programas</small>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card shadow-sm p-3 d-flex align-items-center">
                <div class="icon-shape me-3 text-danger" style="background: #fff5f5;"><i class="fas fa-chalkboard-teacher"></i></div>
                <div>
                    <h3 class="fw-bold mb-0">{{ $totalInstructores }}</h3>
                    <small class="text-muted text-uppercase fw-bold" style="font-size: 10px;">Instructores</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-12 col-lg-8">
            <div class="bg-white p-4 rounded-4 shadow-sm h-100">
                <h5 class="fw-bold mb-4">Acciones Directas</h5>
                <div class="row g-3">
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('Aprendiz.create') }}" class="quick-btn shadow-sm">
                            <i class="fas fa-plus-circle fa-2x mb-2"></i><br>Nuevo Aprendiz
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('Fichasdecaracterizacion.create') }}" class="quick-btn shadow-sm">
                            <i class="fas fa-folder-plus fa-2x mb-2"></i><br>Crear Ficha
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{ route('instructor.create') }}" class="quick-btn shadow-sm">
                            <i class="fas fa-user-plus fa-2x mb-2"></i><br>Vincular Instructor
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
