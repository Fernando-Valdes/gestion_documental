<?php
    require_once("../config/conexion.php");
    require_once("encryptController.php");
    require_once("../models/usuarioModel.php");
    $usuario = new Usuario();
    $conexion = new Conectar(); 


    if (isset($_GET['autorizacion']) && isset($_GET['clave'])) 
    {
        $encriptador = new SimpleEncrypt($_GET['clave']);
        $Enlace = $encriptador->desencriptar($_GET['autorizacion']);
        $datos=$usuario->get_usuario_x_id($Enlace);  

        if(is_array($datos)==true and count($datos)>0)
        {
            foreach($datos as $row)
            {
                if($row["activo_usuario"] == 1)
                {
                    $_SESSION["enlace"] = $row["enlace"];
                    $_SESSION["nombre"] = $row["nombre"];
                    $_SESSION["paterno"] = $row["paterno"];
                    $_SESSION["materno"] = $row["materno"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["puesto_usuario"] = $row["puesto_usuario"];
                    $_SESSION["fk_organo"] = $row["fk_organo"];
                    $_SESSION["id_rol"] = $row["id_rol"];
                    $_SESSION["nombre_rol"] = $row["nombre_rol"];
                    $_SESSION["nombre_corto_rol"] = $row["nombre_corto_rol"];
                    $_SESSION["descripcion_rol"] = $row["descripcion_rol"];
                    $_SESSION["id_rol_usuario"] = $row["id_rol_usuario"];
                }
                else
                {
                    header("Location:" . $conexion->ruta() . "index.php");
                }
            }
           
            header("Location:" . $conexion->ruta() . "view/Home/home.php");
        } 
        else
        {
             header("Location:" . $conexion->ruta() . "index.php");
        }
    }  
?>

