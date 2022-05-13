<div>
    @if (isset($cliente))
        <input type="hidden" name="identifier" id="identifier" value="{{ $cliente->id }}">
    @endif
    <div class="mb-3">
        <label for="nombres" class="form-label">Nombre (s)</label>
        <input type="text" name="nombres" id="nombres" value="{{ $cliente->nombres ?? '' }}" class="form-control"
            placeholder="Eje. Jhon" aria-describedby="helpId">
    </div>

    <div class="d-flex row">
        <div class="mb-3 col">
            <label for="apellido_paterno" class="form-label">Apellido paterno</label>
            <input type="text" name="apellido_paterno" id="apellido_paterno"
                value="{{ $cliente->apellido_paterno ?? '' }}" class="form-control" placeholder="Eje. Connor"
                aria-describedby="helpId">
        </div>

        <div class="mb-3 col">
            <label for="apellido_materno" class="form-label">Apellido materno</label>
            <input type="text" name="apellido_materno" id="apellido_materno"
                value="{{ $cliente->apellido_materno ?? '' }}" class="form-control" placeholder="Eje. Connor"
                aria-describedby="helpId">
        </div>
    </div>

    <div class="mb-3 col">
        <label for="domicilio" class="form-label">Domicilio</label>
        <input type="text" name="domicilio" id="domicilio" value="{{ $cliente->domicilio ?? '' }}"
            class="form-control" placeholder="Eje. Conocido" aria-describedby="helpId">
    </div>

    <div class="mb-3">
        <label for="correo" class="form-label">Correo</label>
        <input type="email" name="correo" id="correo" value="{{ $cliente->correo ?? '' }}" class="form-control"
            placeholder="ejemplo@ejemplo.com" aria-describedby="helpId">
    </div>
</div>
