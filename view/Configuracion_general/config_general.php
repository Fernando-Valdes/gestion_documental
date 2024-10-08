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
                    <input type="hidden" id="id_general" name="id_general">

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="A_ACTUAL">AÑO ACTUAL : </label>
                                    <input type="text" class="form-control" id="A_ACTUAL" name="A_ACTUAL">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="LEYENDA">LEYENDA : </label>
                                    <textarea class="form-control" id="LEYENDA" rows="3" name="LEYENDA" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="TELEFONO">TELÉFONO : </label>
                                    <input type="text" class="form-control" id="TELEFONO" name="TELEFONO">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="DIRECCION">DIRECCIÓN : </label>
                                    <textarea class="form-control" id="DIRECCION" rows="3" name="DIRECCION" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="card" style="width: 18rem;">
                                        <img src="../../public/img/logo-2-mob.png" class="img-fluid" alt="Logo" width="150" height="150">
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
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <section class="card">
                                        <header class="card-header">
                                            PERSONA USUARIA PRESIDENCIA
                                        </header>
                                        <div class="card-block">
                                            <input id="PRESIDENCIA" type="text" class="form-control" placeholder="Seleccionar persona" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <br>
                                            <button type="button" name="action" id="btnContactanos" class="btn btn-inline btn-secondary glyphicon glyphicon-pencil"> Seleccionar</button>
                                        </div>
                                    </section>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <section class="card">
                                        <header class="card-header">
                                            PERSONA USUARIA COORDINACIÓN DE ARCHIVOS
                                        </header>
                                        <div class="card-block">
                                            <input id="ARCHIVOS" type="text" class="form-control" placeholder="Seleccionar persona" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <br>
                                            <button type="button" name="action" id="btnContactanos" class="btn btn-inline btn-secondary glyphicon glyphicon-pencil"> Seleccionar</button>
                                        </div>
                                    </section>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <section class="card">
                                        <header class="card-header">
                                            PERSONA USUARIA UNIDAD DE APOYO ADMINISTRATIVO
                                        </header>
                                        <div class="card-block">
                                            <input id="ADMINISTRATIVO" type="text" class="form-control" placeholder="Seleccionar persona" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <br>
                                            <button type="button" name="action" id="btnContactanos" class="btn btn-inline btn-secondary glyphicon glyphicon-pencil"> Seleccionar</button>
                                        </div>
                                    </section>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-2">
                                <br>
                                <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
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

	<?php require_once("../MainJs/js.php");?>

	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script type="text/javascript" src="series.js"></script>


</body>
</html>
<?php	
  }else 
  {
    $conexion = new Conectar(); // Crear una instancia de la clase Conectar
    header("Location:" . $conexion->ruta() . "index.php");
}
?>