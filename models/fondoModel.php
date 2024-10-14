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

        public function GetFondos()
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();

            $sql="SELECT 	
                    id_fondo,
                    fondo,
                    clave_fondo,
                    activo_fondo
                FROM cat_fondo";

            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function InsertFondo($Clave, $Fondo)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();

            $sql="INSERT INTO cat_fondo	
                    SET 
                        fondo=?,
                        clave_fondo=?,
                        fk_general=1";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Fondo);
            $sql->bindValue(2, $Clave);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function UpdateFondo($IdFondo, $Clave, $Fondo)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();

            $sql="UPDATE cat_fondo	
                    SET 
                        fondo=?,
                        clave_fondo=?,
                        fk_general=1
                    WHERE id_fondo=?";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Fondo);
            $sql->bindValue(2, $Clave);
            $sql->bindValue(3, $IdFondo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function DesactivarFondo($IdFondo)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();

            $sql="UPDATE cat_fondo	
                    SET 
                        activo_fondo = 0
                    WHERE id_fondo=?";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $IdFondo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function ActivarFondo($IdFondo)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();

            $sql="UPDATE cat_fondo	
                    SET 
                        activo_fondo = 1
                    WHERE id_fondo=?";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $IdFondo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function GetFondoXid($IdFondo)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();

            $sql="SELECT 	
                    id_fondo,
                    fondo,
                    clave_fondo,
                    activo_fondo
                FROM cat_fondo
                WHERE id_fondo=?";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $IdFondo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
?>
