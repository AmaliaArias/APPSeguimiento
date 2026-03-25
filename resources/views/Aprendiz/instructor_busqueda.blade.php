@extends('layouts.app')

@section('contenido')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-body p-5 text-center">
                        <i class="fas fa-search fa-3x text-sena mb-4"></i>
                        <h3 class="fw-bold">Consultar mi Instructor</h3>
                        <p class="text-muted">Ingresa tu número de documento para conocer a tu instructor asignado.</p>

                        <form action="{{ route('instructor.buscar') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <input type="number" name="numdoc" class="form-control form-control-lg text-center" placeholder="Ej: 1065255" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Consultar Ahora</button>
                        </form>

                        <div class="mt-3">
                            <a href="{{ route('aprendiz.dashboard') }}" class="text-muted small text-decoration-none">Volver al inicio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
