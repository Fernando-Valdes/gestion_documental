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
                    <input type="hidden" id="id_Serie" name="id_Serie">

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <img src="../../public/img/logo-2-mob.png" class="img-fluid" alt="Logo" width="150" height="150">
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="usu_asig">AÑO ACTUAL : </label>
                                    <input type="text" class="form-control" id="SECCION" name="SECCION">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="usu_asig">TELÉFONO : </label>
                                    <input type="text" class="form-control" id="SECCION" name="SECCION">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label class="form-label" for="NOMBRE_SERIE">LEYENDA : </label>
                            <input type="text" class="form-control" id="NOMBRE_SERIE" name="NOMBRE_SERIE" required>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="form-group">
                            <label class="form-label" for="FUNCION_GENERA_SERIE">DIRECCIÓN : </label>
                            <textarea class="form-control" id="FUNCION_GENERA_SERIE" rows="3" name="FUNCION_GENERA_SERIE" required></textarea>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="row">

                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label class="form-label" for="usu_asig">PERSONA PRESIDENTA : </label>
                                    <input type="text" class="form-control" id="SECCION" name="SECCION">
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                <br>
                                <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-5">
                            </div>

                            <div class="col-sm-2">
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