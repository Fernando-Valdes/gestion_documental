<?php
    require_once("../config/conexion.php");
    require_once("../models/fondoModel.php");
    $Fondo = new Fondo();
    $html = "";


    switch($_GET["opcion"])
    {
        case "GetFondoComboBox":
            $datos = $Fondo->GetFondoComboBox();

            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_fondo']."'>".$row['clave_fondo']." - ".$row['fondo']."</option>";
                }
                echo $html;
            }    
            
        break;

        case "GetFondos":
            $datos=$Fondo->GetFondos();
            $data= Array();

            foreach($datos as $row)
            {
                $sub_array = array();
                $sub_array[] = $row["clave_fondo"];
                $sub_array[] = $row["fondo"];

                
                if($row["activo_fondo"] == "0")
                {
                    $sub_array[] = '<span class="label label-pill label-warning">Inactivo</span>';

                    $sub_array[] = '<button type="button" onClick="editar('.$row["id_fondo"].');"  id="'.$row["id_fondo"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>'.
                                            '<button type="button" onClick="Activar('.$row["id_fondo"].');"  id="'.$row["id_fondo"].'" class="btn btn-inline btn-success btn-sm ladda-button"><i class="glyphicon glyphicon-ok"></i></button>'.
                                            '<button type="button" onClick="ver('.$row["id_fondo"].');"  id="'.$row["id_fondo"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                }
                else
                {
                    $sub_array[] = '<span class="label label-pill label-success">Activo</span>';

                    $sub_array[] = '<button type="button" onClick="editar('.$row["id_fondo"].');"  id="'.$row["id_fondo"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>'.
                    '<button type="button" onClick="Desactivar('.$row["id_fondo"].');"  id="'.$row["id_fondo"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="glyphicon glyphicon-remove"></i></button>'.
                    '<button type="button" onClick="ver('.$row["id_fondo"].');"  id="'.$row["id_fondo"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
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

        case "guardaryeditar":

            if(empty($_POST["id_Fondo"]))
            {       
                $Fondo->InsertFondo($_POST["Clave"],$_POST["Fondo"]);   
            }
            else 
            {
                $Fondo->UpdateFondo($_POST["id_Fondo"],$_POST["Clave"],$_POST["Fondo"]);   
            }

        break;

        case "DesactivarFondo":
            $Fondo->DesactivarFondo($_POST["id_Fondo"]);
        break;

        case "ActivarFondo":
            $Fondo->ActivarFondo($_POST["id_Fondo"]);
        break;

        case "GetFondoXid":
            $datos=$Fondo->GetFondoXid($_POST["id_Fondo"]);

            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $Respuesta["id_fondo"] = $row["id_fondo"];
                    $Respuesta["fondo"] = $row["fondo"];
                    $Respuesta["clave_fondo"] = $row["clave_fondo"];
                }
                echo json_encode($Respuesta);
            }   

        break;

    }
?>