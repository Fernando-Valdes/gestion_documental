<?php
    class Fondo extends Conectar
    {
        public function GetFondoComboBox()
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();

            $sql="SELECT 	
                    id_fondo,
                    fondo,
                    clave_fondo
                FROM cat_fondo
                WHERE activo_fondo =1";

            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
?>
