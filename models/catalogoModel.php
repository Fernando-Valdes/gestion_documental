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
}
?>
