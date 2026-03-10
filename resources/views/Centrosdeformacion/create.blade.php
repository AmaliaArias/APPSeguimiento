@extends('layouts.app')

@section('contenido')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0" style="border-radius: 15px;">
                    <div class="card-header bg-white border-0 pt-4 px-4">
                        <h2 class="fw-bold text-dark mb-0"><i class="fas fa-plus-circle text-success me-2"></i>Registrar Nuevo Centro</h2>
                        <hr style="border-top: 3px solid #39a900; width: 50px; opacity: 1;">
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('Centrosdeformacion.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold text-secondary">Código del Centro:</label>
                                    <input type="number" name="Codigo" class="form-control border-2 shadow-none" required style="border-radius: 10px;">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label class="form-label fw-bold text-secondary">Nombre del Centro:</label>
                                    <input type="text" name="Denominacion" class="form-control border-2 shadow-none" required style="border-radius: 10px;">
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-secondary">Dirección:</label>
                                    <input type="text" name="Direccion" class="form-control border-2 shadow-none" required style="border-radius: 10px;">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-secondary">Regional:</label>
                                    <select name="tbl_regionales_NIS" class="form-select border-2 shadow-none" required style="border-radius: 10px;">
                                        <option value="">Seleccione...</option>
                                        @foreach($regionales as $reg)
                                            <option value="{{ $reg->NIS }}">{{ $reg->Denominacion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-bold text-secondary">Observaciones:</label>
                                <textarea name="Observaciones" class="form-control border-2 shadow-none" rows="3" style="border-radius: 10px;"></textarea>
                            </div>
                            <div class="d-flex gap-2 pt-2">
                                <button type="submit" class="btn btn-success px-4 fw-bold shadow-sm" style="background-color: #39a900; border: none; border-radius: 8px;">
                                    <i class="fas fa-save me-1"></i> Guardar Centro
                                </button>
                                <a href="{{ route('Centrosdeformacion.index') }}" class="btn btn-light px-4 text-secondary border" style="border-radius: 8px;">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
