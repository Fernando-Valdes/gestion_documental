<?php
    require_once("../config/conexion.php");
    require_once("../models/catalogoModel.php");
    $Catalogos = new Catalogos();
    $html = "";


    switch($_GET["opcion"])
    {
        case "GetYearComboBox":
            $datos = $Catalogos->GetYearComboBox($_POST["fondo"]);
            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_year']."'>".$row['YEAR']."</option>";
                }
                echo $html;
            }    
        break;

        case "GetYearVigenciaComboBox":
            $datos = $Catalogos->GetYearVigenciaComboBox($_POST["fondo"]);
            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_year_vigencia']."'>".$row['YEAR_vigencia']."</option>";
                }
                echo $html;
            }    
        break;

        case "GetValorDocumentalComboBox":
            $datos = $Catalogos->GetValorDocumentalComboBox($_POST["fondo"]);
            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_valor']."'>".$row['valor']."</option>";
                }
                echo $html;
            }    
        break;

        case "GetRolComboBox":
            if ($_SESSION['id_rol'] == 1)
            {
                $datos = $Catalogos->GetRolComboBox();
            }
            else
            {
                $datos = $Catalogos->GetRolComboBoxSinAdmin();
            }
            
            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_rol']."'>".$row['nombre_rol']."</option>";
                }
                echo $html;
            }    
        break;

        case "GetConfiguracionGeneral";
        
            $datos=$Catalogos->GetConfiguracionGeneral();  
            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $output["id_general"] = $row["id_general"];
                    $output["logo"] = 'data:image/jpeg;base64,' . base64_encode($row["logo"]);
                    $output["general_a_actual"] = $row["general_a_actual"];
                    $output["general_leyenda"] = $row["general_leyenda"];
                    $output["general_direccion"] = $row["general_direccion"];
                    $output["general_telefono"] = $row["general_telefono"];
                    $output["fk_user_presidencia"] = $row["fk_user_presidencia"];
                    $output["user_presidencia"] = $row["user_presidencia"];
                    $output["fk_user_uaa"] = $row["fk_user_uaa"];
                    $output["user_uaa"] = $row["user_uaa"];
                    $output["fk_user_coordinacion_archivo"] = $row["fk_user_coordinacion_archivo"];
                    $output["user_archivo"] = $row["user_archivo"];
                }
                echo json_encode($output);
            }   
        break;
    }
?>