<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["enlace"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<title>Configuración general</title>
</head>
<body class="with-side-menu">

    <?php require_once("../MainHeader/header.php");?>

    <div class="mobile-menu-left-overlay"></div>
    
    <?php require_once("../MainNav/nav.php");?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">
			<section class="card">
                <header class="card-header text-center" role="alert" style="background-color: #0f9e8f; color: white;" id="TITULO"> 
                    CONFIGURACIÓN GENERAL
                </header>
				<div class="card-block">
                    <input type="hidden" id="fk_user_presidencia" name="fk_user_presidencia">
                    <input type="hidden" id="fk_user_uaa" name="fk_user_uaa">
                    <input type="hidden" id="fk_user_coordinacion_archivo" name="fk_user_coordinacion_archivo">

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="A_ACTUAL"><strong>AÑO ACTUAL :</strong></label>
                                    <input type="text" class="form-control" id="A_ACTUAL" name="A_ACTUAL">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="LEYENDA"><strong>LEYENDA :</strong></label>
                                    <textarea class="form-control" id="LEYENDA" rows="3" name="LEYENDA" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="TELEFONO"><strong>TELÉFONO :</strong></label>
                                    <input type="text" class="form-control" id="TELEFONO" name="TELEFONO">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="DIRECCION"><strong>DIRECCIÓN :</strong></label>
                                    <textarea class="form-control" id="DIRECCION" rows="3" name="DIRECCION" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="card" style="width: 18rem;">
                                        <img id= "Logo" src="https://th.bing.com/th/id/OIP.vdLhCweCZv9RiPS8IlolEQHaFz?rs=1&pid=ImgDetMain" alt="Imagen" class="img-fluid">
                                        <div class="card-body">
                                            <input class="form-control" type="file" id="formFile">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label class="form-label" for="DIRECCION"><strong>MAGISTRADA PRESIDENTA : </strong></label>
                                    <input id="PRESIDENCIA" type="text" class="form-control" placeholder="Seleccionar persona" aria-label="Recipient's username" aria-describedby="button-addon2">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                <br>
                                <button type="button" name="action" id="btnMagistrado" class="btn btn-inline btn-secondary glyphicon glyphicon-search"> Buscar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label class="form-label" for="DIRECCION"> <strong>TITULAR DEL ÁREA COORDINACIÓN DE ARCHIVOS : </strong> </label>
                                    <input id="ARCHIVOS" type="text" class="form-control" placeholder="Seleccionar persona" aria-label="Recipient's username" aria-describedby="button-addon2">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                <br>
                                <button type="button" name="action" id="btnContactanos" class="btn btn-inline btn-secondary glyphicon glyphicon-search"> Buscar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label class="form-label" for="DIRECCION"> <strong>TITULAR DE LA UNIDAD DE APOYO ADMINISTRATIVO : </strong> </label>
                                    <input id="ADMINISTRATIVO" type="text" class="form-control" placeholder="Seleccionar persona" aria-label="Recipient's username" aria-describedby="button-addon2">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                <br>
                                <button type="button" name="action" id="btnContactanos" class="btn btn-inline btn-secondary glyphicon glyphicon-search"> Buscar</button>
                                </div>
                            </div>
                        </di>
                    </div>

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-2">
                                <br>
                                <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary glyphicon glyphicon-ok"> Guardar</button>
                            </div>
                            <div class="col-sm-5">
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
	<!-- Contenido -->

    <?php require_once("modalUserPresidencia.php");?>
	<?php require_once("../MainJs/js.php");?>

	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script type="text/javascript" src="config_general.js"></script>


</body>
</html>
<?php	
  }else 
  {
    $conexion = new Conectar(); // Crear una instancia de la clase Conectar
    header("Location:" . $conexion->ruta() . "index.php");
}
?>