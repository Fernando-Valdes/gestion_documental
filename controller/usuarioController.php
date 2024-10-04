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
                    $sub_array[] = 'Sin Asignar';
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
                }else
                {
                    $sub_array[] = '<span class="label label-pill label-info">Inactivo</span>';
                }

                $sub_array[] = '<button type="button" onClick="editar('.$row["enlace"].');"  id="'.$row["enlace"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>'.
                               '<button type="button" onClick="eliminar('.$row["enlace"].');"  id="'.$row["enlace"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="glyphicon glyphicon-remove"></i></button>'.
                               '<button type="button" onClick="ver('.$row["enlace"].');"  id="'.$row["enlace"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                
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
            $datos=$usuario->obtener_datos_usuario_siga($_POST["id"]);

            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $DatosEmpleado["usu_id"] = $row["usu_id"];
                }
                echo json_encode($output);
            }   

        break;

    }  
?>