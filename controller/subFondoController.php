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

        
        case "GetSubFondoXid":  
        break;

        case "Guardar":  
        break;

        case "Editar":  
        break;

        case "Noactivo":  
        break;
    }
?>