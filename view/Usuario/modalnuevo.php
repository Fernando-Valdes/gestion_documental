<div id="modalnuevo" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" id="btnEmpleadoSiga" class="btn btn-inline btn-danger"><i class="glyphicon glyphicon-search"></i> Buscar empleado en SIGA</button>
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo"></h4>
                
            </div>
            <form method="post" id="usuario_form">
                <div class="modal-body">
                    <input type="hidden" id="Enlace_Apoyo" name="Enlace_Apoyo">

                    <div class="form-group">
                        <label class="form-label" for="Enlace"><strong>Enlace : </strong></label>
                        <input type="text" class="form-control" id="Enlace" name="Enlace" placeholder="Ingrese el número de enlace" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="Prefijo"><strong>Prefijo : </strong></label>
                        <input type="text" class="form-control" id="Prefijo" name="Prefijo" placeholder="Ingrese el prefijo" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="Nombres"><strong>Nombres : </strong></label>
                        <input type="text" class="form-control" id="Nombres" name="Nombres" placeholder="Ingrese el nombre" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="Apellido_Paterno"><strong>Apellido Paterno : </strong></label>
                        <input type="text" class="form-control" id="Apellido_Paterno" name="Apellido_Paterno" placeholder="Ingrese el apellido paterno" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="Apellido_Materno"><strong>Apellido Materno : </strong></label>
                        <input type="text" class="form-control" id="Apellido_Materno" name="Apellido_Materno" placeholder="Ingrese el apellido materno" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="Correo_electronico"><strong>Correo eléctronico : </strong></label>
                        <input type="email" class="form-control" id="Correo_electronico" name="Correo_electronico" placeholder="Ingrese el correo eléctronico" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="Puesto"><strong>Puesto : </strong></label>
                        <input type="text" class="form-control" id="Puesto" name="Puesto" placeholder="Ingrese el puesto" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="rol_id"><strong>Rol : </strong></label>
                        <select class="select2" id="rol_id" name="rol_id">
                        </select>
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