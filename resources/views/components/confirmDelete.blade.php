<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border border-danger">
            <div class="modal-header bg-danger">
                <h5 class="modal-title">Eliminar cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="m-messages">
                </div>
                <input type="hidden" name="identifier" id="identifier">
                Se eliminara el cliente permanentemente.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnConfirmar">Aceptar</button>
            </div>
        </div>
    </div>
</div>
