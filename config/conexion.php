<?php
    class Conectar{
        protected $dbh;

        protected function Conexion(){
            try {
                $conectar = $this->dbh = new PDO("mysql:host=20.216.41.245;dbname=g3_19","G3_19","uvpNtoKU");
                return $conectar;
            } catch (Exeption $e) {
                print "¡Error BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        public function set_names(){
              return $this->dbh->query("SET NAMES 'utf8'");  
        }
    }
?>    
        