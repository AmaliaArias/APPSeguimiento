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

        /* Header Institucional */
        header {
            background-color: white;
            padding: 12px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 4px solid #39a900; /* Verde SENA */
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        /* Navegación - Corregido el color para que se vea profesional */
        .nav-sena {
            background: #2f3e4e;
            display: flex;
            overflow-x: auto;
            white-space: nowrap;
            padding: 0 15px;
            scrollbar-width: none;
        }
        .nav-sena::-webkit-scrollbar { display: none; }

        .nav-sena a {
            color: #ffffff;
            padding: 14px 18px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-sena a:hover {
            background: #39a900; /* Verde al pasar el mouse */
            color: white;
        }

        /* Contenedor principal corregido */
        .main-content {
            padding: 30px;
            min-height: 80vh;
        }

        /* Clases globales para tus botones y tablas */
        .btn-sena { background-color: #39a900; color: white; border-radius: 6px; font-weight: 600; border: none; }
        .btn-sena:hover { background-color: #2d8500; color: white; }

        .card-custom {
            background: white;
            border-radius: 12px;
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            padding: 20px;
        }
    </style>
</head>
<body>

<header>
    <a href="{{ url('/') }}" class="text-decoration-none d-flex align-items-center">
        <i class="fas fa-leaf fa-2x me-2" style="color: #39a900;"></i>
        <span class="h3 mb-0 fw-bold" style="color: #39a900;">Seguimiento <span style="color: #2c3e50;">SENA</span></span>
    </a>
    <div class="d-none d-md-block text-secondary">
        <i class="fas fa-user-circle me-1"></i> Sistema de Gestión Documental
    </div>
</header>

<nav class="nav-sena">
    <a href="{{ url('/') }}"><i class="fas fa-home"></i> Inicio</a>
    <a href="{{ route('Tiposdocumentos.index') }}"><i class="fas fa-file-alt"></i> T. Documentos</a>
    <a href="{{ route('programasdeformacion.index') }}"><i class="fas fa-graduation-cap"></i> Programas</a>
    <a href="{{ route('Centrosdeformacion.index') }}"><i class="fas fa-landmark"></i> Centros</a>
    <a href="{{ route('instructor.index') }}"><i class="fas fa-chalkboard-teacher"></i> Instructores</a>
    <a href="{{ route('Aprendiz.index') }}"><i class="fas fa-chalkboard-teacher"></i> Aprendices</a>
    <a href="{{ route('Eps.index') }}"><i class="fas fa-chalkboard-teacher"></i> EPS</a>
    <a href="{{ route('Regionales.index') }}"><i class="fas fa-chalkboard-teacher"></i> Regionales</a>
    <a href="{{ route('Entecoformador.index') }}"><i class="fas fa-handshake"></i> Entes</a>
    <a href="/Fichasdecaracterizacion/index"><i class="fas fa-users"></i> Fichas</a>
    <a href="/Rolesadministrativos/index"><i class="fas fa-user-shield"></i> Roles Admin.</a>
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
