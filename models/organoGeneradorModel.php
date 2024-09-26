<?php
    class organoGenerador extends Conectar{

        public function GetorganoGenerador()
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();

            $sql="SELECT 
                        id_organo,
                        clave_organo,
                        organo_generador,
                        seccion,
                        subfondo,
                        fondo,
                        CONVERT(CONCAT(U_O.nombre, ' ', U_O.paterno, ' ', U_O.materno) USING utf8) AS Usuario_Organo,
                        CONVERT(CONCAT(U_R.nombre, ' ', U_R.paterno, ' ', U_R.materno) USING utf8) AS Usuario_Responsable
                    FROM cat_organo_generador
                    INNER JOIN cat_usuario U_O ON fk_user_organo_generador = U_O.enlace
                    INNER JOIN cat_usuario U_R ON fk_user_responsable_archivo = U_R.enlace
                    INNER JOIN cat_subfondo ON fk_subfondo = id_subfondo
                    INNER JOIN cat_fondo ON cat_subfondo.fk_fondo = id_fondo
                    WHERE activo_organo=1";

            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>