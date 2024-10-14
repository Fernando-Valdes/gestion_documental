<?php
    class Catalogos extends Conectar
    {
        public function GetYearComboBox()
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();

            $sql="SELECT 
                    id_year,
                    YEAR
                FROM cat_year";

            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    public function GetYearVigenciaComboBox()
    {
        $conectar= parent::conexion("gestion_documental");
        parent::set_names();

        $sql="SELECT 
                id_year_vigencia,
                YEAR_vigencia
            FROM cat_year_vigencia";

        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    public function GetValorDocumentalComboBox()
    {
        $conectar= parent::conexion("gestion_documental");
        parent::set_names();

        $sql="SELECT 
                id_valor,
                valor
            FROM cat_valor_documental";

        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    public function GetRolComboBox()
    {
        $conectar= parent::conexion("gestion_documental");
        parent::set_names();

        $sql="SELECT 
                id_rol,
                nombre_rol
            FROM cat_rol";

        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    public function GetRolComboBoxSinAdmin()
    {
        $conectar= parent::conexion("gestion_documental");
        parent::set_names();

        $sql="SELECT 
                id_rol,
                nombre_rol
            FROM cat_rol
            WHERE id_rol<>1";

        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    public function GetConfiguracionGeneral()
    {
        $conectar= parent::conexion("gestion_documental");
        parent::set_names();

        $sql="SELECT 	
                id_general,
                logo,
                general_a_actual,
                general_leyenda,
                general_direccion,
                general_telefono,
                fk_user_presidencia,
                CONVERT(CONCAT(pres.prefijo, ' ', pres.nombre, ' ', pres.paterno, ' ', pres.materno) USING utf8) AS user_presidencia,
                fk_user_uaa,
                CONVERT(CONCAT(uaa.prefijo, ' ', uaa.nombre, ' ', uaa.paterno, ' ', uaa.materno) USING utf8) AS user_uaa,
                fk_user_coordinacion_archivo,
                CONVERT(CONCAT(arch.prefijo, ' ', arch.nombre, ' ', arch.paterno, ' ', arch.materno) USING utf8) AS user_archivo
            FROM cat_general
            INNER JOIN cat_usuario pres ON fk_user_presidencia = pres.enlace
            INNER JOIN cat_usuario uaa ON fk_user_uaa = uaa.enlace
            INNER JOIN cat_usuario arch ON fk_user_coordinacion_archivo = arch.enlace
            WHERE id_general=1";

        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    public function guardarConfigGeneral($logo,$general_a_actual,$general_leyenda,$general_direccion,$general_telefono,$fk_user_presidencia,$fk_user_uaa,$fk_user_coordinacion_archivo)
    {

        $conectar= parent::conexion("gestion_documental");
        parent::set_names();
        $sql="UPDATE cat_general
                SET 
                    logo=?,
                    general_a_actual=?,
                    general_leyenda=?,
                    general_direccion=?,
                    general_telefono=?,
                    fk_user_presidencia=?,
                    fk_user_uaa=?,
                    fk_user_coordinacion_archivo=?
                WHERE id_general=1";

        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $logo, PDO::PARAM_LOB);
        $sql->bindValue(2, $general_a_actual);
        $sql->bindValue(3, $general_leyenda);
        $sql->bindValue(4, $general_direccion);
        $sql->bindValue(5, $general_telefono);
        $sql->bindValue(6, $fk_user_presidencia);
        $sql->bindValue(7, $fk_user_uaa);
        $sql->bindValue(8, $fk_user_coordinacion_archivo);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

}
?>
