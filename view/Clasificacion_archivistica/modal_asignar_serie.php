<div id="modalasignarserie" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <centre> <h4 class="modal-title" id="mdltitulo">FICHA TÉCNICA DE VALORACIÓN DOCUMENTAL - AGREGAR SERIE </h4></centre>
            </div>

            <form method="post" id="serie_form">
                <div class="modal-body">
                    <input type="hidden" id="id_Serie" name="id_Serie">

                    <div class="form-group">
                        <label class="form-label" for="FONDO">FONDO</label>
                        <select class="select2" id="FONDO" name="FONDO" data-placeholder="Seleccionar" required></select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="usu_asig">SUB-FONDO</label>
                        <select class="select2" id="usu_asig" name="usu_asig" data-placeholder="Seleccionar" required>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="usu_asig">ÓRGANO GENERADOR</label>
                        <select class="select2" id="usu_asig" name="usu_asig" data-placeholder="Seleccionar" required>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="SECCION">SECCIÓN (Función Común)</label>
                        <input type="text" class="form-control" id="SECCION" name="SECCION" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="CLAVE_SERIE">CLAVE DE LA SERIE (Función Sustantiva)</label>
                        <input type="text" class="form-control" id="CLAVE_SERIE" name="CLAVE_SERIE" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="NOMBRE_SERIE">NOMBRE DE LA SERIE</label>
                        <input type="text" class="form-control" id="NOMBRE_SERIE" name="NOMBRE_SERIE" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="FUNCION_GENERA_SERIE">FUNCIÓN POR LA CUAL SE GENERA LA SERIE DOCUMENTAL</label>
                        <textarea class="form-control" id="FUNCION_GENERA_SERIE" rows="5" name="FUNCION_GENERA_SERIE" required></textarea>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Asignar</button>
                </div>
            </form>
        </div>
    </div>
</div>