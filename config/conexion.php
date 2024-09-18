<?php
    session_start();

    class Conectar{
        protected $dbh;

        protected function Conexion(){
            try {
                //Local
				$conectar = $this->dbh = new PDO("mysql:host=192.168.1.225;dbname=andercode_helpdesk","user_helpdesk","Systema$10");
				return $conectar;
			} catch (Exception $e) {
				print "¡Error BD!: " . $e->getMessage() . "<br/>";
				die();
			}
        } 
        public function set_names(){
            return $this->dbh->query("SET NAMES'utf8mb4'");
        }

        public function ruta(){
            return "http://192.168.1.121:80/sistema_helpdesk2/";
        }

    }
?>