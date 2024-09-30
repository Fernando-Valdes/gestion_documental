<?php
    require_once("../config/conexion.php");
    require_once("../models/catalogoModel.php");
    $Catalogos = new Catalogos();
    $html = "";


    switch($_GET["opcion"])
    {
        case "get_fondo":
            $datos = $Catalogos->get_fondo();

            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_fondo']."'>".$row['clave_fondo']." - ".$row['fondo']."</option>";
                }
                echo $html;
            }    
        break;

        case "get_subfondo":
            //$datos = $Catalogos->get_subfondo($_POST["fondo"]);
            $datos = $Catalogos->get_subfondo(1);
            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_subfondo']."'>".$row['clave_fondo'].".".$row['clave_subfondo']." - ".$row['subfondo']."</option>";
                }
                echo $html;
            }    
        break;

        case "get_OrganoXsubfondo":
            //$datos = $Catalogos->get_OrganoXsubfondo($_POST["subfondo"]);
            $datos = $Catalogos->get_OrganoXsubfondo(1);

            if(is_array($datos)==true and count($datos)>0)
            {
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_organo']."'>".$row['clave_fondo'].".".$row['clave_subfondo'].".".$row['clave_organo']." - ".$row['organo_generador']."</option>";
                }
                echo $html;
            }    
        break;
    }
?>