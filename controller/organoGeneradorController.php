<?php
    require_once("../config/conexion.php");
    require_once("../models/organoGeneradorModel.php");
    $organoGenerador = new organoGenerador();
    $html = "";


    switch($_GET["opcion"])
    {
        case "GetOrganosGeneradores":
            $datos=$organoGenerador->GetOrganosGeneradores();
            $data= Array();

            foreach($datos as $row)
            {
                $sub_array = array();
                $sub_array[] = $row["clave_organo"];
                $sub_array[] = $row["seccion"];
                $sub_array[] = $row["organo_generador"];


                if($row["activo_organo"] == "0")
                {
                    $sub_array[] = '<span class="label label-pill label-warning">Inactivo</span>';

                    $sub_array[] = '<button type="button" onClick="editar('.$row["id_organo"].');"  id="'.$row["id_organo"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>'.
                                            '<button type="button" onClick="Activar('.$row["id_organo"].');"  id="'.$row["id_organo"].'" class="btn btn-inline btn-success btn-sm ladda-button"><i class="glyphicon glyphicon-ok"></i></button>'.
                                            '<button type="button" onClick="ver('.$row["id_organo"].');"  id="'.$row["id_organo"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                }
                else
                {
                    $sub_array[] = '<span class="label label-pill label-success">Activo</span>';

                    $sub_array[] = '<button type="button" onClick="editar('.$row["id_organo"].');"  id="'.$row["id_organo"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>'.
                    '<button type="button" onClick="Desactivar('.$row["id_organo"].');"  id="'.$row["id_organo"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="glyphicon glyphicon-remove"></i></button>'.
                    '<button type="button" onClick="ver('.$row["id_organo"].');"  id="'.$row["id_organo"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
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




















        case "GetOrganoGeneradorComboBox":
            $datos = $organoGenerador->GetOrganoGeneradorComboBox();
            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_organo']."'>".$row['organo_generador']."</option>";
                }
                echo $html;
            }    

        break;

        case "GetOrganoGeneradorComboBoxXsubFondo":
            $datos = $organoGenerador->GetOrganoGeneradorComboBoxXsubFondo($_POST["subfondo"]);

            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_organo']."'>".$row['clave_fondo'].".".$row['clave_subfondo'].".".$row['clave_organo']." - ".$row['organo_generador']."</option>";
                }
                echo $html;
            }    

        break;

        case "GetOrganoGeneradorXid";
        
            $datos=$organoGenerador->GetorganoGeneradorXid($_POST["organoGenerador"]);  
            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $output["id_organo"] = $row["id_organo"];
                    $output["clave_organo"] = $row["clave_organo"];
                    $output["organo_generador"] = $row["organo_generador"];
                    $output["seccion"] = $row["seccion"];
                    $output["subfondo"] = $row["subfondo"];
                    $output["fondo"] = $row["fondo"];
                    $output["Usuario_Organo"] = $row["Usuario_Organo"];
                    $output["Usuario_Responsable"] = $row["Usuario_Responsable"];
                }
                echo json_encode($output);
            }   
        break;

    }
?>