<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["enlace"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<title>Agregar Serie</title>
</head>
<body class="with-side-menu">

    <?php require_once("../MainHeader/header.php");?>

    <div class="mobile-menu-left-overlay"></div>
    
    <?php require_once("../MainNav/nav.php");?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">
			<section class="card">
				<header class="card-header">
                    FICHA TÉCNICA DE VALORACIÓN DOCUMENTAL (AGREGAR SERIE)
				</header>
				<div class="card-block">
                    <input type="hidden" id="id_Serie" name="id_Serie">

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="FONDO">FONDO</label>
                                    <select class="select2" id="FONDO" name="FONDO" data-placeholder="Seleccionar" required></select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="usu_asig">SUB-FONDO</label>
                                    <select class="select2" id="SUB-FONDO" name="SUB-FONDO" data-placeholder="Seleccionar" required></select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="ORGANO_GENERADOR">ÓRGANO GENERADOR</label>
                                    <select class="select2" id="ORGANO_GENERADOR" name="ORGANO_GENERADOR" data-placeholder="Seleccionar" required></select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="SECCION">SECCIÓN (Función Común)</label>
                                    <input type="text" class="form-control" id="SECCION" name="SECCION" required>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="CLAVE_SERIE">CLAVE DE LA SERIE (Función Sustantiva)</label>
                                    <input type="text" class="form-control" id="CLAVE_SERIE" name="CLAVE_SERIE" required>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="NOMBRE_SERIE">NOMBRE DE LA SERIE</label>
                                    <input type="text" class="form-control" id="NOMBRE_SERIE" name="NOMBRE_SERIE" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="FUNCION_GENERA_SERIE">FUNCIÓN POR LA CUAL SE GENERA LA SERIE DOCUMENTAL</label>
                                    <textarea class="form-control" id="FUNCION_GENERA_SERIE" rows="3" name="FUNCION_GENERA_SERIE" required></textarea>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="form-label" for="NOMBRE_SERIE">AÑO DE INICIO</label>
                                    <input type="text" class="form-control" id="NOMBRE_SERIE" name="NOMBRE_SERIE" required>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="form-label" for="NOMBRE_SERIE">AÑO DE CIERRE</label>
                                    <input type="text" class="form-control" id="NOMBRE_SERIE" name="NOMBRE_SERIE" required>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-12">
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="ORGANO_INTERVIENE_SERIE">ÓRGANO GENERADOR QUE INTERVIENE EN LA RECEPCIÓN, TRÁMITE Y CONCLUSIÓN DE LOS ASÚNTOS TEMAS A LOS QUE SE REFIERE LA SERIE</label>
                                    <textarea class="form-control" id="ORGANO_INTERVIENE_SERIE" rows="3" name="ORGANO_INTERVIENE_SERIE" required></textarea>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="ORGANO_INTERVIENE_SERIE">PALABRAS CLAVE O TÉRMINOS RELACIONADOS CON LA SERIE (no más de cinco)</label>
                                    <textarea class="form-control" id="ORGANO_INTERVIENE_SERIE" rows="3" name="ORGANO_INTERVIENE_SERIE" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="FUNCION_GENERA_SERIE">DESCRIPCIÓN DE LA SERIE</label>
                                    <textarea class="form-control" id="FUNCION_GENERA_SERIE" rows="1" name="FUNCION_GENERA_SERIE" required></textarea>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="form-label" for="NOMBRE_SERIE">TOPOLOGÍA DOCUMENTAL</label>
                                    <input type="text" class="form-control" id="NOMBRE_SERIE" name="NOMBRE_SERIE" required>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="form-label" for="NOMBRE_SERIE">SOPORTE DOCUMENTAL</label>
                                    <input type="text" class="form-control" id="NOMBRE_SERIE" name="NOMBRE_SERIE" required>
                                </div>
                            </div>
                        </div>
                    </div>
                

                    <div class="col-xl-12">
                        <div class="row">

                            <div class="col-sm-4">
                                <div class="form-group">
                                <br>
                                    <label class="form-label" for="usu_asig">VALORES DOCUMENTALES DE LA SERIE (VALORES PRIMARIOS)</label>
                                    <select class="select2" id="usu_asig" name="usu_asig" data-placeholder="Seleccionar" required></select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                <br>
                                    <label class="form-label" for="usu_asig">VIGENCIA DOCUMENTAL EN AÑOS DE LA SERIE (VERIFICAR NORMATIVIDAD AL RESPECTO)</label>
                                    <select class="select2" id="usu_asig" name="usu_asig" data-placeholder="Seleccionar" required></select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="usu_asig">¿TIENE VALOR SECUNDARIO LA SERIE DOCUMENTAL? (HISTORICO, TESTIMONIAL, EVIDENCIAL Y/O ESTADÍSTICO)</label>
                                    <select class="select2" id="usu_asig" name="usu_asig" data-placeholder="Seleccionar" required></select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-4">

                                <div class="form-group">
                                    <label class="form-label" for="FONDO">CONSERVACIÓN PEMANENTE</label>
                                    <select class="select2" id="FONDO" name="FONDO" data-placeholder="Seleccionar" required></select>
                                </div> 
                                
                                <div class="form-group">
                                    <label class="form-label" for="usu_asig">ELIMINACIÓN</label>
                                    <select class="select2" id="usu_asig" name="usu_asig" data-placeholder="Seleccionar" required></select>
                                </div>

                            </div>

                            <div class="col-sm-4">
                                <section class="card">
                                    <header class="card-header">
                                        REPONSABLE ÓRGANO GENERADOR
                                    </header>
                                    <div class="card-block">
                                        <centre> <h8 id="mdltitulo"></h8></centre>
                                    </div>
                                </section>
                            </div>

                            <div class="col-sm-4">
                                <section class="card">
                                    <header class="card-header">
                                        REPONSABLE DEL ARCHIVO DE TRÁMITE
                                    </header>
                                    <div class="card-block">
                                        <centre> <h8 id="mdltitulo"></h8></centre>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-4">
                            </div>

                            <div class="col-sm-4">
                            </div>

                            <div class="col-sm-4">
                                <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
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
	<script type="text/javascript" src="Serie.js"></script>


</body>
</html>
<?php	
  }else 
  {
    $conexion = new Conectar(); // Crear una instancia de la clase Conectar
    header("Location:" . $conexion->ruta() . "index.php");
}
?>