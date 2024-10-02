<?php
    require_once("../config/conexion.php");
    require_once("../models/organoGeneradorModel.php");
    $organoGenerador = new organoGenerador();
    $html = "";

    switch($_GET["opcion"])
    {
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

        case "Guardar":  
        break;

        case "Editar":  
        break;

        case "Noactivo":  
        break;
    }
?>