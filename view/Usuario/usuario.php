<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["enlace"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Administración de Usuarios</title>
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
					ADMINISTRACIÓN DE USUARIOS
				</header>
				<div class="box-typical box-typical-padding">
					<button type="button" id="btnnuevo" class="btn btn-inline btn-primary"><i class="glyphicon glyphicon-plus"></i> Agregar usuario</button>
					<table id="usuario_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
						<thead>
							<tr>
								<th style="width: 3%;">Enlace</th>
								<th style="width: 10%;">Nombre</th>
								<th style="width: 10%;">Correo</th>
								<th style="width: 5%;">Puesto</th>
								<th style="width: 10%;">Órgano Generador</th>
								<th style="width: 5%;">Rol</th>
								<th style="width: 5%;">Estado</th>
								<th style="width: 10%;">Acciones</th>
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

	<?php require_once("modalnuevo.php");?>
	<?php require_once("modalUsuarioSIGA.php");?>

	<?php require_once("../MainJs/js.php");?>
	
	<script type="text/javascript" src="usuario.js"></script>
	
</body>
</html>
<?php
   } else {
    $conexion = new Conectar(); // Crear una instancia de la clase Conectar
    header("Location:" . $conexion->ruta() . "index.php");
   }
?>