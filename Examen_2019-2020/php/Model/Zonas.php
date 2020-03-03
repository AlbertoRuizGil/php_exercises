<?php

    class Zonas{

        public function __construct(){}
        
        public function getZonas($db){
            $conexion = $db->getConnection();
            $sql="SELECT DISTINCT `zona` FROM `zonas`";
            $statement = $conexion->prepare($sql);
            $statement->execute();
            return $statement->fetchAll();
        }
    }

?>