<?php
    class Usuario extends Conectar
    {
        public function get_usuario_x_id($enlace)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $sql="SELECT 
                    enlace,
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
                    id_rol_usuario	
                FROM cat_rol_usuario 
                INNER JOIN cat_usuario ON fk_enlace=enlace
                INNER JOIN cat_rol ON fk_rol_usuario = id_rol
                WHERE enlace=? AND activo_usuario=1";
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
                        emp_nombres, 
                        emp_paterno,
                        emp_materno
                    FROM pri_empleado
                    WHERE emp_enlace=?";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $enlace);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_usuario($enlace,$nombre,$paterno,$materno,$email,$puesto_usuario)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $sql="INSERT INTO cat_usuario
                    (enlace,nombre,paterno,materno,email,puesto_usuario)
                  VALUES
                    (?,?,?,?,?,?)";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $enlace);
            $sql->bindValue(2, $nombre);
            $sql->bindValue(3, $paterno);
            $sql->bindValue(4, $materno);
            $sql->bindValue(5, $email);
            $sql->bindValue(6, $puesto_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_rol_usuario($enlace)
        {
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $sql="INSERT INTO cat_rol_usuario
                    (fk_enlace,fk_rol_usuario)
                  VALUES
                    (?,2)";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $enlace);
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
                    WHERE enlace=? AND activo_usuario=1";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $enlace);
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






        




       
        public function update_usuario($usu_id,$usu_nom,$usu_ape,$usu_correo,$usu_pass,$rol_id){
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $sql="UPDATE tm_usuario set
                usu_nom = ?,
                usu_ape = ?,
                usu_correo = ?,
                usu_pass = ?,
                rol_id = ?,
                fech_modi = now()
                WHERE
                usu_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_nom);
            $sql->bindValue(2, $usu_ape);
            $sql->bindValue(3, $usu_correo);
            $sql->bindValue(4, $usu_pass);
            $sql->bindValue(5, $rol_id);
            $sql->bindValue(6, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_usuario($usu_id){
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $sql="UPDATE tm_usuario SET est='0', fech_elim =now() where usu_id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_usuario(){  //Funcion sp Evita inyecciones 
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $sql="call sp_l_usuario_01()";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }


        


        public function get_ticket_todos(){ //Total de tickets administrador
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket"; 
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_usuario_total_x_id($usu_id){ //Total de tickets Usaurio
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket where usu_id = ?"; 
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_ticket_abiertotodos(){
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket where fk_estatus=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_usuario_totalabierto_x_id($usu_id){
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket where usu_id = ? and fk_estatus=1";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_usuario_totalcerradotodos(){
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket where fk_estatus=2";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_usuario_totalcerrado_x_id($usu_id){
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket where usu_id = ? and fk_estatus=2";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_usuario_grafico($usu_id){
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $sql="SELECT tm_categoria.cat_nom as nom,COUNT(*) AS total
                FROM   tm_ticket  JOIN  
                    tm_categoria ON tm_ticket.cat_id = tm_categoria.cat_id  
                WHERE    
                tm_ticket.fk_estatus = 1
                and tm_ticket.usu_id = ?
                GROUP BY 
                tm_categoria.cat_nom 
                ORDER BY total DESC";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_usuario_pass($usu_id,$usu_pass){
            $conectar= parent::conexion("gestion_documental");
            parent::set_names();
            $pass_encrip = md5($_SESSION["usu_correo"]).hash('sha256', $usu_pass);
            $sql="UPDATE tm_usuario
                SET
                    usu_pass = '$pass_encrip'
                WHERE
                    usu_id = $usu_id";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }


    }
?>
