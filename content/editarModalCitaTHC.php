<!-- Modal -->
<div class="modal fade" id="editaModal" tabindex="-1" role="dialog" aria-labelledby="editaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editaModalLabel">Editar registro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>

      <div class="modal-body modalEditar">
        <form method="post" encrypte="multipart/form-data">
        
        <div class="mb-3">    
            <input type="hidden" id="id" name="id">

                <label class="inputInfo">Nombre completo:</label>
            <div class="inputInfo">
                <input type="text" id="nombre" name="nombre">
            </div>

            <label class="inputInfo">Edad:</label>
            <div class="inputInfo">
                <input type="text" id="edad" name="edad" pattern="\d+">
            </div>

            <label class="inputInfo">Genero:</label>
            <div class="inputInfo">
                <input type="text" id="genero" name="genero">
            </div>

            <label class="inputInfo">Domicilio:</label>
            <div class="inputInfo">
                <input type="text" id="domicilio" name="domicilio">
            </div>

            <label class="inputInfo">Nacionalidad:</label>
            <div class="inputInfo">
                <input type="text" id="nacionalidad" name="nacionalidad">
            </div>

            <label class="inputInfo">Teléfono:</label>
            <div class="inputInfo">   
                <input type="text" id="telefono" name="telefono" pattern="\d+">
            </div>

            <label class="inputInfo">Fecha de la Cita:</label>
            <div class="inputInfo">
                <input type="datetime" id="fechaCita" name="fechaCita">
            </div>
            
            <div class="modalBotones">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" name="EditarCitaTHC">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>