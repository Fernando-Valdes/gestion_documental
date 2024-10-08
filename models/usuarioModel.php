<?php
    class Usuario extends Conectar
    {
        public function get_usuario_x_id($enlace)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $sql="SELECT 
                    enlace,
                    Prefijo,
                    nombre,
                    paterno,
                    materno,
                    email,
                    puesto_usuario,
                    fk_organo,
                    id_rol,
                    nombre_rol,
                    nombre_corto_rol,
                    descripcion_rol,
                    id_rol_usuario,
                    activo_usuario
                FROM cat_rol_usuario 
                INNER JOIN cat_usuario ON fk_enlace=enlace
                INNER JOIN cat_rol ON fk_rol_usuario = id_rol
                WHERE enlace=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $enlace);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
              
        public function obtener_datos_usuario_siga($enlace)
        {
            $conectar= parent::conexion("siga_administrativo");
            parent::set_names();
            $sql=" SELECT 
                        emp_enlace, 
                        emp_correoper, 
                        pre_descripcion,
                        emp_nombres, 
                        emp_paterno,
                        emp_materno,
                        cat_nombre
                    FROM pri_empleado
                    INNER JOIN pri_plantilla p ON p.fk_emp_empleado = id_emp_empleado 
                    INNER JOIN pri_plaza ON fk_pla_plaza = id_pla_plaza 
                    INNER JOIN pri_adscripcion ON fk_ads_adscripcion = id_ads_adscripcion 
                    INNER JOIN pri_categoria ON fk_cat_categoria = id_cat_categoria 
                    INNER JOIN cat_prefijo ON fk_pre_prefijo = id_pre_prefijo 
                    WHERE p.pla_estado = 1 AND emp_enlace=?";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $enlace);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_usuario($enlace,$prefijo,$nombre,$paterno,$materno,$email,$puesto_usuario)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $sql="INSERT INTO cat_usuario
                    (enlace,prefijo,nombre,paterno,materno,email,puesto_usuario)
                  VALUES
                    (?,?,?,?,?,?,?)";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $enlace);
            $sql->bindValue(2, $prefijo);
            $sql->bindValue(3, $nombre);
            $sql->bindValue(4, $paterno);
            $sql->bindValue(5, $materno);
            $sql->bindValue(6, $email);
            $sql->bindValue(7, $puesto_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_rol_usuario($enlace, $rol)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $sql="INSERT INTO cat_rol_usuario
                    (fk_enlace,fk_rol_usuario)
                  VALUES
                    (?,?)";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $enlace);
            $sql->bindValue(2, $rol);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_permisos_usuario($enlace)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $sql="  SELECT 
                        id_rol_usuario,
                        id_permiso,
                        nombre_permiso,
                        descripcion_permiso,
                        icon_permiso,
                        href_permiso	
                    FROM cat_rol_usuario 
                    INNER JOIN cat_usuario ON fk_enlace=enlace
                    INNER JOIN cat_rol ON fk_rol_usuario = id_rol
                    INNER JOIN cat_permiso_rol ON fk_rol = id_rol
                    INNER JOIN cat_permiso ON fk_permiso = id_permiso
                    WHERE enlace=? AND activo_usuario=1 AND id_del_padre=0";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $enlace);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_permisos_Hijos($enlace, $id_padre_permiso)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $sql="  SELECT 
                        id_rol_usuario,
                        id_permiso,
                        nombre_permiso,
                        descripcion_permiso,
                        icon_permiso,
                        href_permiso	
                    FROM cat_rol_usuario 
                    INNER JOIN cat_usuario ON fk_enlace=enlace
                    INNER JOIN cat_rol ON fk_rol_usuario = id_rol
                    INNER JOIN cat_permiso_rol ON fk_rol = id_rol
                    INNER JOIN cat_permiso ON fk_permiso = id_permiso
                    WHERE enlace=? AND activo_usuario=1 AND id_del_padre=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $enlace);
            $sql->bindValue(2, $id_padre_permiso);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function actualizar_organo_user($fkOrgano,$enlace)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();

            $sql= " UPDATE cat_usuario
                    SET fk_organo=?
                    WHERE enlace=?";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $fkOrgano);
            $sql->bindValue(2, $enlace);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_TodosLosUsuarios()
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $sql="SELECT 
                    enlace,
                    CONVERT(CONCAT(prefijo, ' ', nombre, ' ', paterno, ' ', materno) USING utf8) AS Nombre,
                    email,
                    puesto_usuario,
                    fk_organo,
                    id_rol,
                    nombre_rol,
                    nombre_corto_rol,
                    descripcion_rol,
                    id_rol_usuario,
                    IF(activo_usuario=1,'Activo', 'Inactivo') AS Estado	
                FROM cat_rol_usuario 
                INNER JOIN cat_usuario ON fk_enlace=enlace
                INNER JOIN cat_rol ON fk_rol_usuario = id_rol";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function obtener_Todos_Empleados_SIGA()
        {
            $conectar= parent::conexion("siga_administrativo");
            parent::set_names();
            $sql=" SELECT 
                            emp_enlace AS Enlace, 
                            CONVERT(CONCAT(pre_descripcion, ' ', emp_nombres, ' ', emp_paterno, ' ', emp_materno) USING utf8) AS Empleado, 
                            emp_correoper,
                            cat_nombre AS Categoria
                    FROM pri_empleado 
                    INNER JOIN pri_plantilla p ON p.fk_emp_empleado = id_emp_empleado 
                    INNER JOIN pri_plaza ON fk_pla_plaza = id_pla_plaza 
                    INNER JOIN pri_adscripcion ON fk_ads_adscripcion = id_ads_adscripcion 
                    INNER JOIN pri_categoria ON fk_cat_categoria = id_cat_categoria 
                    INNER JOIN cat_prefijo ON fk_pre_prefijo = id_pre_prefijo 
                    WHERE p.pla_estado = 1 ";

            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function DesactivarUsuario($enlace)
        {
            $conectar= parent::conexion("gestion_documental");

            parent::set_names();
            $sql="UPDATE cat_usuario SET activo_usuario='0' where enlace=?";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $enlace);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function ActivarUsuario($enlace)
        {
            $conectar= parent::conexion("gestion_documental");

            parent::set_names();
            $sql="UPDATE cat_usuario SET activo_usuario='1' where enlace=?";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $enlace);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function actualizar_usuario_Xid($enlace,$prefijo,$nombre,$paterno,$materno,$email,$puesto_usuario)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $sql="UPDATE cat_usuario
                    SET 
                        prefijo=?,
                        nombre=?,
                        paterno=?,
                        materno=?,
                        email=?,
                        puesto_usuario=?
                    WHERE enlace=?";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $prefijo);
            $sql->bindValue(2, $nombre);
            $sql->bindValue(3, $paterno);
            $sql->bindValue(4, $materno);
            $sql->bindValue(5, $email);
            $sql->bindValue(6, $puesto_usuario);
            $sql->bindValue(7, $enlace);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function actualizar_rol_usuario($enlace, $rol)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $sql="UPDATE cat_rol_usuario
                    SET 
                        fk_rol_usuario=?
                  WHERE fk_enlace=?";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $rol);
            $sql->bindValue(2, $enlace);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
?>
