<?php
    require_once("../config/conexion.php");
    require_once("../models/subFondoModel.php");
    $SubFondo = new SubFondo();
    $html = "";


    switch($_GET["opcion"])
    {
        case "GetSubfondoComboBox":
            $datos = $SubFondo->GetSubfondoComboBox($_POST["fondo"]);
            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_subfondo']."'>".$row['clave_fondo'].".".$row['clave_subfondo']." - ".$row['subfondo']."</option>";
                }
                echo $html;
            }    
        break;

        case "GetSubFondos":
            $datos=$SubFondo->GetSubFondos();
            $data= Array();

            foreach($datos as $row)
            {
                $sub_array = array();
                $sub_array[] = $row["clave_subfondo"];
                $sub_array[] = $row["subfondo"];

                
                if($row["activo_subfondo"] == "0")
                {
                    $sub_array[] = '<span class="label label-pill label-warning">Inactivo</span>';

                    $sub_array[] = '<button type="button" onClick="editar('.$row["id_subfondo"].');"  id="'.$row["id_subfondo"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>'.
                                            '<button type="button" onClick="Activar('.$row["id_subfondo"].');"  id="'.$row["id_subfondo"].'" class="btn btn-inline btn-success btn-sm ladda-button"><i class="glyphicon glyphicon-ok"></i></button>'.
                                            '<button type="button" onClick="ver('.$row["id_subfondo"].');"  id="'.$row["id_subfondo"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                }
                else
                {
                    $sub_array[] = '<span class="label label-pill label-success">Activo</span>';

                    $sub_array[] = '<button type="button" onClick="editar('.$row["id_subfondo"].');"  id="'.$row["id_subfondo"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>'.
                    '<button type="button" onClick="Desactivar('.$row["id_subfondo"].');"  id="'.$row["id_subfondo"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="glyphicon glyphicon-remove"></i></button>'.
                    '<button type="button" onClick="ver('.$row["id_subfondo"].');"  id="'.$row["id_subfondo"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
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

            if(empty($_POST["id_SubFondo"]))
            {       
                $SubFondo->InsertSubFondo($_POST["Clave"],$_POST["SubFondo"],$_POST["FONDO"]);   
            }
            else 
            {
                $SubFondo->UpdateSubFondo($_POST["id_SubFondo"],$_POST["Clave"],$_POST["SubFondo"],$_POST["FONDO"]);   
            }

        break;

        case "GetSubFondoXid":
            $datos=$SubFondo->GetSubFondoXid($_POST["id_SubFondo"]);

            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $Respuesta["id_subfondo"] = $row["id_subfondo"];
                    $Respuesta["clave_subfondo"] = $row["clave_subfondo"];
                    $Respuesta["subfondo"] = $row["subfondo"];
                    $Respuesta["fondo"] = $row["fondo"];
                    $Respuesta["clave_fondo"] = $row["clave_fondo"];
                    $Respuesta["fk_fondo"] = $row["fk_fondo"];
                }
                echo json_encode($Respuesta);
            }   
        break;

        case "DesactivarSubFondo":
            $SubFondo->DesactivarSubFondo($_POST["id_SubFondo"]);
        break;

        case "ActivarSubFondo":
            $SubFondo->ActivarSubFondo($_POST["id_SubFondo"]);
        break;
    }
?>