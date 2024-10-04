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
            $datos = $Catalogos->GetRolComboBox();
            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_rol']."'>".$row['nombre_rol']."</option>";
                }
                echo $html;
            }    
        break;
    }
?>