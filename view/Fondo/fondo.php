<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["enlace"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Administración de Fondo</title>
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
					ADMINISTRACIÓN DE FONDO
				</header>
				<div class="box-typical box-typical-padding">
					<button type="button" id="btnnuevoFondo" class="btn btn-inline btn-primary"><i class="glyphicon glyphicon-plus"></i> Agregar fondo</button>
					<table id="fondo_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
						<thead>
							<tr>
								<th style="width: 3%;">Clave</th>
								<th style="width: 15%;">Fondo</th>
								<th style="width: 3%;">Estado</th>
								<th style="width: 5%;">Acciones</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</section>
		</div>
	</div>

	<!-- Contenido -->

	<?php require_once("modalFondo.php");?>

	<?php require_once("../MainJs/js.php");?>
	
	<script type="text/javascript" src="fondo.js"></script>
	
</body>
</html>
<?php
   } else {
    $conexion = new Conectar(); // Crear una instancia de la clase Conectar
    header("Location:" . $conexion->ruta() . "index.php");
   }
?>