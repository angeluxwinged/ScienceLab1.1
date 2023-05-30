<!-- Modal -->
<div class="modal fade" id="eliminaModal" tabindex="-1" role="dialog" aria-labelledby="eliminaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminaModalLabel">Aviso</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
        </div>

        <div class="modal-body modalEditar">
        ¿Desea eliminar el registro?
        </div>

        <div class="modal-footer">
            <form method="post">

                <input type="hidden" name="id" id="id">
        
                <div class="modalBotones">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger" name="EliminarLabo">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>