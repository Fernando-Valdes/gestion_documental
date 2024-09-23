<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["enlace"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Cuadro de Clasificación archivistica</title>
</head>
<body class="with-side-menu">

    <?php require_once("../MainHeader/header.php");?>

    <div class="mobile-menu-left-overlay"></div>
    
    <?php require_once("../MainNav/nav.php");?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Cuadro de Clasificación archivistica</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Inicio</a></li>
								<li class="active">Series y Subseries</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
			<button type="button" id="btnnuevo" class="btn btn-inline btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Agregar Serie</button>
			<button type="button" id="btnnuevo" class="btn btn-inline btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Agregar Subserie</button>
				<table id="ticket_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th style="width: 5%;">SECCION</th>
							<th style="width: 10%;">SERIE</th>
							<th style="width: 10%;">SUBSERIE</th>
							<th class="d-none d-sm-table-cell" style="width: 40%;">SECCION(SC) - SERIE (SE) - SUBSERIE(SS)</th>
							<th class="d-none d-sm-table-cell" style="width: 10%;">ACCIONES</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>

		</div>
	</div>
	<!-- Contenido -->
	
	<?php require_once("modal_asignar_serie.php");?>

	<?php require_once("../MainJs/js.php");?>

	<script type="text/javascript" src="cuadro_clasificacion.js"></script>

</body>
</html>
<?php	
  }else {
    $conexion = new Conectar(); // Crear una instancia de la clase Conectar
    header("Location:" . $conexion->ruta() . "index.php");
}
?>