<?php
    class SubFondo extends Conectar
    {

        public function GetSubfondoComboBox($fondo)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            
            $sql="SELECT 
                    id_subfondo,
                    clave_fondo,
                    clave_subfondo,
                    subfondo
                FROM cat_subfondo
                INNER JOIN cat_fondo ON fk_fondo = id_fondo
                WHERE fk_fondo=?
                AND activo_subfondo=1";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $fondo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
?>
