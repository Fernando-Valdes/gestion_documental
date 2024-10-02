<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["enlace"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<title>Series</title>
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
                    
                </header>
				<div class="card-block">
                    <input type="hidden" id="id_Serie" name="id_Serie">

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="FONDO">FONDO : </label>
                                    <select class="select2" id="FONDO" name="FONDO" data-placeholder="Seleccionar" required></select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="usu_asig">SUB-FONDO : </label>
                                    <select class="select2" id="SUB-FONDO" name="SUB-FONDO" data-placeholder="Seleccionar" required></select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="ORGANO_GENERADOR">ÓRGANO GENERADOR : </label>
                                    <select class="select2" id="ORGANO_GENERADOR" name="ORGANO_GENERADOR" data-placeholder="Seleccionar" required></select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="SECCION">SECCIÓN (Función Común) : </label>
                                    <input type="text" class="form-control" id="SECCION" name="SECCION" readonly>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="CLAVE_SERIE">CLAVE DE LA SERIE (Función Sustantiva) : </label>
                                    <input type="text" class="form-control" id="CLAVE_SERIE" name="CLAVE_SERIE" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="form-group">
                            <label class="form-label" for="NOMBRE_SERIE">NOMBRE DE LA SERIE : </label>
                            <input type="text" class="form-control" id="NOMBRE_SERIE" name="NOMBRE_SERIE" required>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="form-group">
                            <label class="form-label" for="FUNCION_GENERA_SERIE">FUNCIÓN POR LA CUAL SE GENERA LA SERIE DOCUMENTAL : </label>
                            <textarea class="form-control" id="FUNCION_GENERA_SERIE" rows="3" name="FUNCION_GENERA_SERIE" required></textarea>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="form-group">
                            <label class="form-label" for="ORGANO_INTERVIENE_SERIE">ÓRGANO GENERADOR QUE INTERVIENE EN LA RECEPCIÓN, TRÁMITE Y CONCLUSIÓN DE LOS ASÚNTOS TEMAS A LOS QUE SE REFIERE LA SERIE : </label>
                            <textarea class="form-control" id="ORGANO_INTERVIENE_SERIE" rows="3" name="ORGANO_INTERVIENE_SERIE" required></textarea>
                        </div>
                    </div>
                    
                    <div class="col-xl-12">
                        <div class="row">
                        <div class="col-sm-8">
                                <div class="form-group">
                                    <label class="form-label" for="PALABRAS_CLAVE">PALABRAS CLAVE O TÉRMINOS RELACIONADOS CON LA SERIE (no más de cinco) :</label>
                                    <textarea class="form-control" id="PALABRAS_CLAVE" rows="1" name="PALABRAS_CLAVE" required></textarea>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="form-label" for="YEAR_INICIO">AÑO DE INICIO : </label>
                                    <select class="select2" id="YEAR_INICIO" name="YEAR_INICIO" data-placeholder="Seleccionar" required></select>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="form-label" for="YEAR_CIERRE">AÑO DE CIERRE : </label>
                                    <select class="select2" id="YEAR_CIERRE" name="YEAR_CIERRE" data-placeholder="Seleccionar" required></select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="form-group">
                            <label class="form-label" for="DESCRIPCION_DE_LA_SERIE ">DESCRIPCIÓN DE LA SERIE :</label>
                            <textarea class="form-control" id="DESCRIPCION_DE_LA_SERIE" rows="2" name="DESCRIPCION_DE_LA_SERIE" required></textarea>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="TIPOLOGIA_DOCUMENTAL">TIPOLOGÍA DOCUMENTAL : </label>
                                    <input type="text" class="form-control" id="TOPOLOGIA_DOCUMENTAL" name="TOPOLOGIA_DOCUMENTAL" required>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="SOPORTE_DOCUMENTAL">SOPORTE DOCUMENTAL : </label>
                                    <input type="text" class="form-control" id="SOPORTE_DOCUMENTAL" name="SOPORTE_DOCUMENTAL" required>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-xl-12">
                        <div class="row">

                            <div class="col-sm-4">
                                <div class="form-group">
                                <br>
                                    <label class="form-label" for="VALORES_DOCUMENTALES">VALORES DOCUMENTALES DE LA SERIE (VALORES PRIMARIOS) : </label>
                                    <select class="select2" id="VALORES_DOCUMENTALES" name="VALORES_DOCUMENTALES" data-placeholder="Seleccionar" required></select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                <br>
                                    <label class="form-label" for="VIGENCIA_DOCUMENTAL">VIGENCIA DOCUMENTAL EN AÑOS DE LA SERIE (VERIFICAR NORMATIVIDAD AL RESPECTO) :</label>
                                    <select class="select2" id="VIGENCIA_DOCUMENTAL" name="VIGENCIA_DOCUMENTAL" data-placeholder="Seleccionar" required></select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="TIENE_VALOR_SECUNDARIO ">¿TIENE VALOR SECUNDARIO LA SERIE DOCUMENTAL? (HISTORICO, TESTIMONIAL, EVIDENCIAL Y/O ESTADÍSTICO) : </label>
                                    <select class="select2" id="TIENE_VALOR_SECUNDARIO" name="TIENE_VALOR_SECUNDARIO" data-placeholder="Seleccionar" required>
                                        <option value='1'>SI</option>
                                        <option value='2'>NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="TIENE_CONSERVACION">CONSERVACIÓN PEMANENTE : </label>
                                    <select class="select2" id="TIENE_CONSERVACION" name="TIENE_CONSERVACION" data-placeholder="Seleccionar" required>
                                        <option value='1'>SI</option>
                                        <option value='2'>NO</option>
                                    </select>
                                </div> 
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="ELIMINACION">ELIMINACIÓN : </label>
                                    <select class="select2" id="ELIMINACION" name="ELIMINACION" data-placeholder="Seleccionar" required>
                                        <option value='1'>SI</option>
                                        <option value='2'>NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <section class="card">
                                    <header class="card-header">
                                        REPONSABLE ÓRGANO GENERADOR
                                    </header>
                                    <div class="card-block">
                                        <centre> <h8 id="REPONSABLE_ORGANO"></h8></centre>
                                    </div>
                                </section>
                            </div>

                            <div class="col-sm-6">
                                <section class="card">
                                    <header class="card-header">
                                        REPONSABLE DEL ARCHIVO DE TRÁMITE
                                    </header>
                                    <div class="card-block">
                                        <centre> <h8 id="REPONSABLE_DEL_ARCHIVO"></h8></centre>
                                    </div>
                                </section>
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