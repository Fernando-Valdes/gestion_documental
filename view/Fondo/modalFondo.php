<div id="ModalFondo" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo"></h4>
                
            </div>
            <form method="post" id="fondo_form">
                <div class="modal-body">
                    <input type="hidden" id="id_Fondo" name="id_Fondo">

                    <div class="form-group">
                        <label class="form-label" for="Enlace"><strong>Clave : </strong></label>
                        <input type="text" class="form-control" id="Clave" name="Clave" placeholder="Ingrese el número de la Clave" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="Prefijo"><strong>Fondo : </strong></label>
                        <input type="text" class="form-control" id="Fondo" name="Fondo" placeholder="Ingrese el nombre del Fondo" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>