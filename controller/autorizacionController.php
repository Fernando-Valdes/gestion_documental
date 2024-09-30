<?php
    require_once("../config/conexion.php");
    require_once("encryptController.php");
    require_once("../models/usuarioModel.php");
    $usuario = new Usuario();


    if (isset($_GET['autorizacion']) && isset($_GET['clave'])) 
    {
        $encriptador = new SimpleEncrypt($_GET['clave']);
        $Enlace = $encriptador->desencriptar($_GET['autorizacion']);
        $datos=$usuario->get_usuario_x_id($Enlace);  

        if(is_array($datos)==true and count($datos)>0)
        {
            foreach($datos as $row)
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
            $conexion = new Conectar(); 
            header("Location:" . $conexion->ruta() . "view/Home/home.php");
        } 
        else
        {
            $datos=$this->obtener_datos_usuario_siga($Enlace);  

            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $usuario->insert_usuario($row["emp_enlace"],$row["emp_nombres"],$row["emp_paterno"],$row["emp_materno"],$row["emp_correoper"],$row["emp_enlace"]);
                    $usuario->insert_rol_usuario($row["emp_enlace"]);
                }

                $datos=$usuario->get_usuario_x_id($enlace);  
                if(is_array($datos)==true and count($datos)>0)
                {
                    foreach($datos as $row)
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
                    $conexion = new Conectar(); 
                    header("Location:" . $conexion->ruta() . "view/Home/home.php");
                } 
            } 
        }
    }  
?>

