<div id="ModalSubFondo" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo"></h4>
                
            </div>
            <form method="post" id="Subfondo_form">
                <div class="modal-body">
                    <input type="hidden" id="id_SubFondo" name="id_SubFondo">

                    <div class="form-group">
                        <label class="form-label" for="Clave"><strong>Clave : </strong></label>
                        <input type="text" class="form-control" id="Clave" name="Clave" placeholder="Ingrese el número de la Clave" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="SubFondo"><strong>SubFondo : </strong></label>
                        <input type="text" class="form-control" id="SubFondo" name="SubFondo" placeholder="Ingrese el nombre del SubFondo" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="FONDO"><strong>FONDO : </strong></label>
                        <select class="select2" id="FONDO" name="FONDO" data-placeholder="Seleccionar" required></select>
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