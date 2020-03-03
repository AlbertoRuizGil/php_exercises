<?php

    class Tipos{

        public function __construct(){}
        
        public function getTipos($db){
            $conexion = $db->getConnection();
            $sql="SELECT DISTINCT `tipo` FROM `tipos`";
            $statement = $conexion->prepare($sql);
            $statement->execute();
            return $statement->fetchAll();
        }
    }

?>