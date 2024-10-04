<div id="modalnuevo" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" id="btnEmpleadoSiga" class="btn btn-inline btn-warning"><i class="glyphicon glyphicon-search"></i> Buscar empleado en SIGA</button>
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo"></h4>
                
            </div>
            <form method="post" id="usuario_form">
                <div class="modal-body">
                    <input type="hidden" id="usu_id" name="usu_id">

                    <div class="form-group">
                        <label class="form-label" for="Enlace">Enlace : </label>
                        <input type="text" class="form-control" id="Enlace" name="Enlace" placeholder="Ingrese el número de enlace" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="Prefijo">Prefijo : </label>
                        <input type="text" class="form-control" id="Prefijo" name="Prefijo" placeholder="Ingrese el prefijo" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="Nombres">Nombres : </label>
                        <input type="text" class="form-control" id="Nombres" name="Nombres" placeholder="Ingrese el nombre" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="Apellido_Paterno">Apellido Paterno : </label>
                        <input type="text" class="form-control" id="Apellido_Paterno" name="Apellido_Paterno" placeholder="Ingrese el apellido paterno" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="Apellido_Materno">Apellido Materno : </label>
                        <input type="text" class="form-control" id="Apellido_Materno" name="Apellido_Materno" placeholder="Ingrese el apellido materno" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="Correo_electronico">Correo eléctronico : </label>
                        <input type="email" class="form-control" id="Correo_electronico" name="Correo_electronico" placeholder="Ingrese el correo eléctronico" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="Puesto">Puesto : </label>
                        <input type="text" class="form-control" id="Puesto" name="Puesto" placeholder="Ingrese el puesto" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="rol_id">Rol</label>
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