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
                {
                    $datosPermisoHijos=$usuario->get_permisos_Hijos($_SESSION["enlace"], $row["id_permiso"]); 

                    if(is_array($datosPermisoHijos)==true and count($datosPermisoHijos)>0)
                    {?>
                        <li class="blue-dirty dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="glyphicon glyphicon-list"></span>
                                <span class="lbl"><?php echo $row["nombre_permiso"]?></span>
                            </a>
                            <ul class="dropdown-menu">

                            <?php            
                            foreach($datosPermisoHijos as $rowHijos)
                            {?>
                                <li class="blue-dirty">
                                    <a href="<?php echo $rowHijos["href_permiso"] ?>">
                                        <span class="lbl"><?php echo $rowHijos["nombre_permiso"] ?></span>
                                    </a>
                                </li>
                            <?php   
                            }?>
                            </ul>
                        </li>
                    <?php 
                    }
                    else
                    {?>
                        <li class="blue-dirty">
                            <a href="<?php echo $row["href_permiso"] ?>">
                                <span class="<?php echo $row["icon_permiso"] ?>"></span>
                                <span class="lbl"><?php echo $row["nombre_permiso"] ?></span>
                            </a>
                        </li>
                    <?php
                    }
                }?>
                </ul>
            </nav>
            <?php    
        }
?>

 