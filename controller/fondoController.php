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

        case "GetFondoXid":  
        break;

        case "Guardar":  
        break;

        case "Editar":  
        break;

        case "Noactivo":  
        break;
    }
?>