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
            </nav>
        <?php    
        }
?>

 