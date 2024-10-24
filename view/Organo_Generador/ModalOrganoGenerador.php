<div id="ModalOrganoGenerador" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo"></h4>
                
            </div>
            <form method="post" id="OrganoGenerador_form">
                <div class="modal-body">
                    <input type="hidden" id="id_organoGenerador" name="id_organoGenerador">

                    <div class="form-group">
                        <label class="form-label" for="Clave"><strong>Clave : </strong></label>
                        <input type="text" class="form-control" id="Clave" name="Clave" placeholder="Ingrese el número de la Clave" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="Seccion"><strong>Sección : </strong></label>
                        <input type="text" class="form-control" id="Seccion" name="Seccion" placeholder="Ingrese la sección" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="Organo_Generador"><strong>Organo Generador : </strong></label>
                        <input type="text" class="form-control" id="Organo_Generador" name="Organo_Generador" placeholder="Ingrese la descripción" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="SubFondo"><strong>Sub-Fondo : </strong></label>
                        <select class="select2" id="SubFondo" name="SubFondo" data-placeholder="Seleccionar" required></select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="Titular"><strong>Titular del Organo Generador :</strong></label>
                        <select class="select2" id="Titular" name="Titular" data-placeholder="Seleccionar" required></select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="Responsable_Archivo"><strong>Responsable del archivo : </strong></label>
                        <select class="select2" id="Responsable_Archivo" name="Responsable_Archivo" data-placeholder="Seleccionar" required></select>
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