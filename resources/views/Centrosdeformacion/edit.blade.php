<form action="{{ route('Centrosdeformacion.update', $centro->NIS) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Código:</label>
    <input type="number" name="Codigo" value="{{ $centro->Codigo }}" required>

    <label>Denominación:</label>
    <input type="text" name="Denominacion" value="{{ $centro->Denominacion }}" required>

    {{-- Selector de Ficha Asociada --}}
    <label>Ficha de Caracterización:</label>
    <select name="tbl_fichasdecaracterizacion_NIS">
        @foreach($fichas as $f)
            <option value="{{ $f->NIS }}" {{ $centro->tbl_fichasdecaracterizacion_NIS == $f->NIS ? 'selected' : '' }}>
                {{ $f->Codigo }} - {{ $f->Denominacion }}
            </option>
        @endforeach
    </select>

    <button type="submit">Actualizar Centro</button>
</form>
