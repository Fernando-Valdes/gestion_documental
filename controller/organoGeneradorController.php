<?php
    require_once("../config/conexion.php");
    require_once("../models/organoGeneradorModel.php");
    $organoGenerador = new organoGenerador();
    $html = "";

    switch($_GET["opcion"])
    {
        case "getorgano":
            $datos = $organoGenerador->GetorganoGenerador();
            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_organo']."'>".$row['organo_generador']."</option>";
                }
                echo $html;
            }    
        break;
    }
?>