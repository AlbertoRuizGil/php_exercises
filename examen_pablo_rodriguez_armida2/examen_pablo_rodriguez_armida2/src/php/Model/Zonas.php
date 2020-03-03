<?php

class Zonas{

    public function __construct(){}
    
    public function getZonas($pdo){
        $sql="SELECT DISTINCT `zona` FROM `zonas`";
        $stm = $pdo->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
}