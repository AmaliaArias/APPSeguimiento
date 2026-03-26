<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguimiento SENA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f8fafc; margin: 0; }
        header { background-color: white; padding: 8px 25px; display: flex; justify-content: space-between; align-items: center; border-bottom: 4px solid #39a900; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        .user-menu-btn { background: none; border: none; display: flex; align-items: center; gap: 12px; padding: 5px 10px; border-radius: 8px; transition: 0.2s; text-decoration: none; }
        .user-menu-btn:hover { background-color: #f1f8ed; }
        .role-text { text-align: right; line-height: 1.2; }
        .nav-sena { background: #2f3e4e; display: flex; overflow-x: auto; white-space: nowrap; padding: 0 15px; scrollbar-width: none; }
        .nav-sena::-webkit-scrollbar { display: none; }
        .nav-sena a { color: #ffffff; padding: 14px 18px; text-decoration: none; font-size: 14px; font-weight: 500; transition: 0.3s; display: flex; align-items: center; gap: 8px; }
        .nav-sena a:hover { background: #39a900; color: white; }
        .main-content { padding: 30px; min-height: 80vh; }
        .dropdown-item i { width: 20px; color: #6c757d; }
    </style>
</head>
<body>

<header>
    <a href="{{ url('/dashboard') }}" class="text-decoration-none d-flex align-items-center">
        <i class="fas fa-leaf fa-2x me-2" style="color: #39a900;"></i>
        <span class="h3 mb-0 fw-bold" style="color: #39a900;">Seguimiento <span style="color: #2c3e50;">SENA</span></span>
    </a>

    <div class="dropdown">
        <button class="user-menu-btn dropdown-toggle" type="button" id="dropdownMenuUser" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="role-text d-none d-md-block">
                <span class="d-block fw-bold text-dark" style="font-size: 0.9rem;">{{ auth()->user()->name }}</span>
                <small class="text-muted" style="font-size: 0.75rem;">
                    @if(auth()->user()->rol_id == 1) Administrador @endif
                    @if(auth()->user()->rol_id == 2) Instructor @endif
                    @if(auth()->user()->rol_id == 3) Aprendiz @endif
                </small>
            </div>
            <i class="fas fa-user-circle fa-2x" style="color: #39a900;"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
            <li><h6 class="dropdown-header">Opciones de Usuario</h6></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-user-edit"></i> Editar Perfil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger fw-bold">
                        <i class="fas fa-sign-out-alt text-danger"></i> Cerrar Sesión
                    </button>
                </form>
            </li>
        </ul>
    </div>
</header>

<nav class="nav-sena">
    <a href="{{ url('/dashboard') }}"><i class="fas fa-home"></i> Inicio</a>

    {{-- Vistas para Aprendiz --}}
    @if(auth()->user()->rol_id == 3)
        <a href="{{ route('Bitacoras.index') }}"><i class="fas fa-file-invoice"></i> Mis Bitácoras</a>
        <a href="/aprendiz/practicas"><i class="fas fa-briefcase"></i> Mi Etapa Práctica</a>
    @endif

    {{-- Vistas para Instructor --}}
    @if(auth()->user()->rol_id == 2) {{-- Instructor --}}
    <a href="{{ route('instructor.dashboard') }}"><i class="fas fa-users"></i> Mis Aprendices</a>
    @endif

    {{-- Vistas para Administrador --}}
    @if(auth()->user()->rol_id == 1)
        <a href="{{ route('Tiposdocumentos.index') }}"><i class="fas fa-file-alt"></i> T. Documentos</a>
        <a href="{{ route('programasdeformacion.index') }}"><i class="fas fa-graduation-cap"></i> Programas</a>
        <a href="{{ route('Centrosdeformacion.index') }}"><i class="fas fa-landmark"></i> Centros</a>
        <a href="{{ route('instructor.index') }}"><i class="fas fa-chalkboard-teacher"></i> Instructores</a>
        <a href="{{ route('Aprendiz.index') }}"><i class="fas fa-user-graduate"></i> Aprendices</a>
        <a href="/Fichasdecaracterizacion/index"><i class="fas fa-id-card"></i> Fichas</a>
        <a href="/Rolesadministrativos/index"><i class="fas fa-user-shield"></i> Roles Admin.</a>
    @endif
</nav>

<div class="container main-content">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @yield('contenido')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
