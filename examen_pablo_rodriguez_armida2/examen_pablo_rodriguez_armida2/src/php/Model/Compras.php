<?php

class Compras{

    public function __construct(){}
    
        public function insert($pdo, $userid, $casaid, $date)
        {
            $sql = "INSERT INTO `compras` (`usuario_id`,`casa_id`, `fecha`) 
            VALUES(?,?,?)";
            $stm = $pdo->prepare($sql);
            $stm->execute([$userid, $casaid, $date]);
        }
}