@extends('layouts.app')

@section('contenido')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0" style="border-radius: 15px;">
                    <div class="card-header bg-white border-0 pt-4 px-4">
                        <h2 class="fw-bold text-dark mb-0">
                            <i class="fas fa-edit text-success me-2"></i>Editar Centro de Formación
                        </h2>
                        <hr style="border-top: 3px solid #39a900; width: 50px; opacity: 1;">
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('Centrosdeformacion.update', $centro->NIS) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold text-secondary small uppercase">Código:</label>
                                    <input type="number" name="Codigo" class="form-control border-2 shadow-none" value="{{ $centro->Codigo }}" required style="border-radius: 10px;">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label class="form-label fw-bold text-secondary small uppercase">Denominación:</label>
                                    <input type="text" name="Denominacion" class="form-control border-2 shadow-none" value="{{ $centro->Denominacion }}" required style="border-radius: 10px;">
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-secondary small uppercase">Dirección:</label>
                                    <input type="text" name="Direccion" class="form-control border-2 shadow-none" value="{{ $centro->Direccion }}" required style="border-radius: 10px;">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-secondary small uppercase">Regional:</label>
                                    <select name="tbl_regionales_NIS" class="form-select border-2 shadow-none" required style="border-radius: 10px;">
                                        @foreach($regionales as $reg)
                                            <option value="{{ $reg->NIS }}" {{ $centro->tbl_regionales_NIS == $reg->NIS ? 'selected' : '' }}>
                                                {{ $reg->Denominacion }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold text-secondary small uppercase">Ficha de Caracterización:</label>
                                <select name="tbl_fichasdecaracterizacion_NIS" class="form-select border-2 shadow-none" style="border-radius: 10px;">
                                    <option value="">Seleccione una ficha...</option>
                                    @foreach($fichas as $f)
                                        <option value="{{ $f->NIS }}" {{ $centro->tbl_fichasdecaracterizacion_NIS == $f->NIS ? 'selected' : '' }}>
                                            {{ $f->Codigo }} - {{ $f->Denominacion }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold text-secondary small uppercase">Observaciones:</label>
                                <textarea name="Observaciones" class="form-control border-2 shadow-none" rows="3" style="border-radius: 10px;">{{ $centro->Observaciones }}</textarea>
                            </div>

                            <div class="d-flex gap-2 pt-2 border-top mt-4">
                                <button type="submit" class="btn btn-success px-4 fw-bold shadow-sm" style="background-color: #39a900; border: none; border-radius: 8px;">
                                    <i class="fas fa-sync-alt me-1"></i> Actualizar Centro
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
