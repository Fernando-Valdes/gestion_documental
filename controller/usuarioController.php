<?php
    require_once("../config/conexion.php");
    require_once("../models/usuarioModel.php");
    require_once("../models/organoGeneradorModel.php");

    $usuario = new Usuario(); 
    $organoGenerador = new organoGenerador();


    switch($_GET["opcion"])
    {

        case "actualizarOrgano":
            $usuario->actualizar_organo_user($_POST["Ubicaciones"],$_SESSION["enlace"]);
            $_SESSION["fk_organo"] = $_POST["Ubicaciones"];
        break;


        case "get_TodosLosUsuarios":
            $datos=$usuario->get_TodosLosUsuarios();
            $data= Array();

            foreach($datos as $row)
            {
                $sub_array = array();
                $sub_array[] = $row["enlace"];
                $sub_array[] = $row["Nombre"];
                $sub_array[] = $row["email"];
                $sub_array[] = $row["puesto_usuario"];

                
                if($row["fk_organo"] == "0")
                {
                    $sub_array[] = '<span class="label label-pill label-warning">Sin Asignar</span>';
                }
                else
                {
                    $DatosOrgano = $organoGenerador->GetOrganoGeneradorXid($row["fk_organo"]);
                    foreach($DatosOrgano as $rowOrgano)
                    {
                        $sub_array[] = $rowOrgano['organo_generador'];
                    }
                }

                $sub_array[] = $row["nombre_rol"];


                if ($row["Estado"]=="Activo")
                {
                    $sub_array[] = '<span class="label label-pill label-success">Activo</span>';

                    if($_SESSION['id_rol'] != 1)
                    {
                        if($row["id_rol"] ==1)
                        {
                            $sub_array[] = '<button type="button" onClick="ver('.$row["enlace"].');"  id="'.$row["enlace"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                        }
                        else
                        {
                            $sub_array[] = '<button type="button" onClick="editar('.$row["enlace"].');"  id="'.$row["enlace"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>'.
                                            '<button type="button" onClick="Desactivar('.$row["enlace"].');"  id="'.$row["enlace"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="glyphicon glyphicon-remove"></i></button>'.
                                            '<button type="button" onClick="ver('.$row["enlace"].');"  id="'.$row["enlace"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                        }
                        
                    }
                    else
                    {
                        $sub_array[] = '<button type="button" onClick="editar('.$row["enlace"].');"  id="'.$row["enlace"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>'.
                                    '<button type="button" onClick="Desactivar('.$row["enlace"].');"  id="'.$row["enlace"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="glyphicon glyphicon-remove"></i></button>'.
                                    '<button type="button" onClick="ver('.$row["enlace"].');"  id="'.$row["enlace"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                    }
                   
                }else
                {
                    $sub_array[] = '<span class="label label-pill label-info">Inactivo</span>';

                    if($_SESSION['id_rol'] != 1)
                    {
                        if($row["id_rol"] ==1)
                        {
                            $sub_array[] = '<button type="button" onClick="ver('.$row["enlace"].');"  id="'.$row["enlace"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                        }
                        else
                        {
                            $sub_array[] = '<button type="button" onClick="editar('.$row["enlace"].');"  id="'.$row["enlace"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>'.
                                            '<button type="button" onClick="Activar('.$row["enlace"].');"  id="'.$row["enlace"].'" class="btn btn-inline btn-success btn-sm ladda-button"><i class="glyphicon glyphicon-ok"></i></button>'.
                                            '<button type="button" onClick="ver('.$row["enlace"].');"  id="'.$row["enlace"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                        }
                        
                    }
                    else
                    {
                        $sub_array[] = '<button type="button" onClick="editar('.$row["enlace"].');"  id="'.$row["enlace"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>'.
                                        '<button type="button" onClick="Activar('.$row["enlace"].');"  id="'.$row["enlace"].'" class="btn btn-inline btn-success btn-sm ladda-button"><i class="glyphicon glyphicon-ok"></i></button>'.
                                        '<button type="button" onClick="ver('.$row["enlace"].');"  id="'.$row["enlace"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                    }
                }
                
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);

        break;

        case "obtener_Todos_Empleados_SIGA":
            $datos=$usuario->obtener_Todos_Empleados_SIGA();
            $data= Array();

            foreach($datos as $row)
            {
                $sub_array = array();
                $sub_array[] = '<a href="#" class="nombrePersona" data-id="'.$row["Enlace"].'">'.$row["Empleado"].'</a>';
                
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);

        break;

        case "obtener_Datos_Empleados_SIGA_Xid":
            $datos=$usuario->obtener_datos_usuario_siga($_POST["Enlace"]);

            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $DatosEmpleado["Enlace"] = $row["emp_enlace"];
                    $DatosEmpleado["Correo"] = $row["emp_correoper"];
                    $DatosEmpleado["Prefijo"] = $row["pre_descripcion"];
                    $DatosEmpleado["Puesto"] = $row["cat_nombre"];
                    $DatosEmpleado["Nombres"] = $row["emp_nombres"];
                    $DatosEmpleado["Paterno"] = $row["emp_paterno"];
                    $DatosEmpleado["Materno"] = $row["emp_materno"];
                }
                echo json_encode($DatosEmpleado);
            }   

        break;

        case "guardaryeditar":
            if(empty($_POST["Enlace_Apoyo"]))
            {       
                $usuario->insert_usuario($_POST["Enlace"],$_POST["Prefijo"],$_POST["Nombres"],$_POST["Apellido_Paterno"],$_POST["Apellido_Materno"],$_POST["Correo_electronico"],$_POST["Puesto"]);   
                $usuario->insert_rol_usuario($_POST["Enlace"],$_POST["rol_id"]);  
            }
            else 
            {
                $usuario->actualizar_usuario_Xid($_POST["Enlace"],$_POST["Prefijo"],$_POST["Nombres"],$_POST["Apellido_Paterno"],$_POST["Apellido_Materno"],$_POST["Correo_electronico"],$_POST["Puesto"]);   
                $usuario->actualizar_rol_usuario($_POST["Enlace"],$_POST["rol_id"]);  
            }
        break;

        case "DesactivarUsuario":
            $usuario->DesactivarUsuario($_POST["enlace"]);
        break;

        case "ActivarUsuario":
            $usuario->ActivarUsuario($_POST["enlace"]);
        break;

        case "get_usuario_x_id":
            $datos=$usuario->get_usuario_x_id($_POST["Enlace"]);

            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $DatosEmpleado["enlace"] = $row["enlace"];
                    $DatosEmpleado["Prefijo"] = $row["Prefijo"];
                    $DatosEmpleado["nombre"] = $row["nombre"];
                    $DatosEmpleado["paterno"] = $row["paterno"];
                    $DatosEmpleado["materno"] = $row["materno"];
                    $DatosEmpleado["email"] = $row["email"];
                    $DatosEmpleado["puesto_usuario"] = $row["puesto_usuario"];
                    $DatosEmpleado["fk_organo"] = $row["fk_organo"];
                    $DatosEmpleado["id_rol"] = $row["id_rol"];
                    $DatosEmpleado["nombre_rol"] = $row["nombre_rol"];
                    $DatosEmpleado["nombre_corto_rol"] = $row["nombre_corto_rol"];
                    $DatosEmpleado["descripcion_rol"] = $row["descripcion_rol"];
                    $DatosEmpleado["id_rol_usuario"] = $row["id_rol_usuario"];
                }
                echo json_encode($DatosEmpleado);
            }   

        break;

        case "obtener_Todos_EmpleadosModal":
            $datos=$usuario->obtener_Todos_EmpleadosModal();
            $data= Array();

            foreach($datos as $row)
            {
                $sub_array = array();
                $sub_array[] = '<a href="#" class="nombrePersona" data-id="'.$row["Enlace"].'">'.$row["Empleado"].'</a>';
                
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);

        break;

    }  
?>