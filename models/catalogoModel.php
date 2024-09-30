<?php
    class Catalogos extends Conectar
    {
        public function get_fondo()
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

        public function get_subfondo($fondo)
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

        public function get_OrganoXsubfondo($subfondo)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            
            $sql="SELECT 
                        id_organo,
                        clave_fondo,
                        clave_subfondo,
                        clave_organo,
                        organo_generador,
                        seccion
                    FROM cat_organo_generador
                    INNER JOIN cat_subfondo ON fk_subfondo = id_subfondo
                    INNER JOIN cat_fondo ON fk_subfondo = id_fondo
                    WHERE fk_subfondo=? 
                    AND activo_organo=1";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $subfondo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
              
    }
?>
