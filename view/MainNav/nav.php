<?php
        require_once("../../config/conexion.php");
        require_once("../../models/usuarioModel.php");
        $usuario = new Usuario();
        $datos=$usuario->get_permisos_usuario($_SESSION["enlace"]);  


        if(is_array($datos)==true and count($datos)>0)
        {?>
            <nav class="side-menu">
            <ul class="side-menu-list">
        <?php
            foreach($datos as $row)
            {?>
                <li class="blue-dirty">
                    <a href="<?php echo $row["href_permiso"] ?>">
                        <span class="<?php echo $row["icon_permiso"] ?>"></span>
                        <span class="lbl"><?php echo $row["nombre_permiso"] ?></span>
                    </a>
                </li>
            <?php
            }?>
            </ul>
            <li><a><i class="fa fa-user"></i> Inicio <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="home.php">Home</a></li>
                      <li><a href="../MiPerfil/miperfil.php">Datos Personales</a></li>
                      <li><a href="../MiPerfil/laboral.php">Datos laboral</a></li>
                    </ul>
                  </li>
            </nav>
        <?php    
        }
?>

 