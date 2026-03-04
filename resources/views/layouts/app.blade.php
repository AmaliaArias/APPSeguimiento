<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; margin: 0; }

        /* Header adaptable */
        header {
            background-color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #39a900;
        }

        /* Navegación responsiva con scroll en móviles */
        .nav-sena {
            background: #2c3e50;
            display: flex;
            overflow-x: auto;
            white-space: nowrap;
            padding: 5px 10px;
        }

        .nav-sena a {
            color: #ecf0f1;
            padding: 10px 15px;
            text-decoration: none;
            font-size: 13px;
            transition: 0.3s;
        }

        .nav-sena a:hover {
            color: #39a900;
            background: rgba(255,255,255,0.1);
            border-radius: 5px;
        }

        /* Contenedor de pantalla completa */
        .main-wrapper {
            padding: 20px;
            width: 100%;
        }

        /* Ajuste para tablas en celulares */
        .table-responsive {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        /* Estilo de alertas */
        .alert { border-radius: 10px; font-weight: 500; }
    </style>
</head>
<body>

<header>
    <a href="{{ url('/') }}" class="text-decoration-none d-flex align-items-center">
        <i class="fas fa-leaf fa-2x me-2" style="color: #39a900;"></i>
        <span class="h4 mb-0 fw-bold" style="color: #39a900;">Seguimiento <span style="color: #2c3e50;">SENA</span></span>
    </a>
    <div class="d-none d-md-block text-muted small">Sistema de Gestión Documental</div>
</header>

<nav class="nav-sena">
    <a href="{{ route('Tiposdocumentos.index') }}"><i class="fas fa-file-alt"></i> T. Documentos</a>
    <a href="{{ route('programasdeformacion.index') }}"><i class="fas fa-graduation-cap"></i> Programas</a>
    <a href="{{ route('Centrosdeformacion.index') }}"><i class="fas fa-landmark"></i> Centros</a>
    <a href="{{ route('Instructor.index') }}"><i class="fas fa-chalkboard-teacher"></i> Instructores</a>
    <a href="{{ route('Entecoformador.index') }}"><i class="fas fa-handshake"></i> Entes</a>
    <a href="/Fichasdecaracterizacion/index"><i class="fas fa-users"></i> Fichas</a>
    <a href="/Eps/index"><i class="fas fa-hospital"></i> EPS</a>
    <a href="/Aprendiz/index"><i class="fas fa-user-graduate"></i> Aprendiz</a>
    <a href="/Regionales/index"><i class="fas fa-map-marked-alt"></i> Regionales</a>
    <a href="/Rolesadministrativos/index"><i class="fas fa-user-shield"></i> Roles Admin.</a>
</nav>

<div class="container-fluid main-wrapper">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive shadow-sm">
        @yield('contenido')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html
