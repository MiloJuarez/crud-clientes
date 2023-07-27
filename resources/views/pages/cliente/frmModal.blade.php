<!-- Modal -->
<div class="modal fade" id="frmModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border border-info">
            <div class="modal-header bg-info">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" name="frmModal">
                    <div id="frm-messages">
                    </div>
                    <input type="hidden" name="identifier" id="identifier">
                    <div>
                        <div class="mb-3">
                            <label for="nombres" class="form-label">Nombre (s)</label>
                            <input type="text" name="nombres" id="nombres" class="form-control"
                                placeholder="Eje. Jhon" aria-describedby="helpId">
                        </div>

                        <div class="d-flex row">
                            <div class="mb-3 col">
                                <label for="apellido_paterno" class="form-label">Apellido paterno</label>
                                <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control"
                                    placeholder="Eje. Connor" aria-describedby="helpId">
                            </div>

                            <div class="mb-3 col">
                                <label for="apellido_materno" class="form-label">Apellido materno</label>
                                <input type="text" name="apellido_materno" id="apellido_materno" class="form-control"
                                    placeholder="Eje. Connor" aria-describedby="helpId">
                            </div>
                        </div>

                        <div class="mb-3 col">
                            <label for="domicilio" class="form-label">Domicilio</label>
                            <input type="text" name="domicilio" id="domicilio" class="form-control"
                                placeholder="Eje. Conocido" aria-describedby="helpId">
                        </div>

                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" name="correo" id="correo" class="form-control"
                                placeholder="ejemplo@ejemplo.com" aria-describedby="helpId">
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="frmSubmit">Aceptar</button>
            </div>
        </div>
    </div>
</div>
