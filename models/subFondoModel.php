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

        public function GetSubFondos()
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();

            $sql="SELECT 
                    id_subfondo,
                    clave_subfondo,
                    subfondo,
                    fondo,
                    clave_fondo,
                    fondo,
                    activo_subfondo
                FROM cat_subfondo
                INNER JOIN cat_fondo ON id_fondo = fk_fondo";

            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function InsertSubFondo($Clave, $SubFondo, $IdFondo)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();

            $sql="INSERT INTO cat_subfondo	
                    SET 
                        clave_subfondo=?,
                        subfondo=?,
                        fk_fondo=?";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Clave);
            $sql->bindValue(2, $SubFondo);
            $sql->bindValue(3, $IdFondo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function UpdateSubFondo($IdSubFondo, $Clave, $SubFondo, $IdFondo)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();

            $sql="UPDATE cat_subfondo	
                    SET 
                        clave_subfondo=?,
                        subfondo=?,
                        fk_fondo=?
                    WHERE id_subfondo=?";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Clave);
            $sql->bindValue(2, $SubFondo);
            $sql->bindValue(3, $IdFondo);
            $sql->bindValue(4, $IdSubFondo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function DesactivarSubFondo($IdSubFondo)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();

            $sql="UPDATE cat_subfondo	
                    SET 
                        activo_subfondo = 0
                    WHERE id_subfondo=?";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $IdSubFondo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function ActivarSubFondo($IdSubFondo)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();

            $sql="UPDATE cat_subfondo	
                    SET 
                        activo_subfondo = 1
                    WHERE id_subfondo=?";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $IdSubFondo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function GetSubFondoXid($IdSubFondo)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();

            $sql="SELECT 
                    id_subfondo,
                    clave_subfondo,
                    subfondo,
                    fondo,
                    clave_fondo,
                    fk_fondo
                FROM cat_subfondo
                INNER JOIN cat_fondo ON id_fondo = fk_fondo
                WHERE id_subfondo=?";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $IdSubFondo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
?>
