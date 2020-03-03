<?php

class Usuarios{

    public function __construct(){}

    public function registered($pdo, $mail, $pass){
        $sql ="SELECT id FROM usuarios WHERE mail=:mail AND pass=:pass";
        $stm = $pdo->prepare($sql);
        $stm->bindParam(":mail", $mail);
        $stm->bindParam(":pass", $pass);
        $stm->execute();
        return $stm->fetch()->id;
    }

    public function insert($pdo, $arr)
    {
        $sql = "INSERT INTO `usuarios` (`mail`,`pass`,`nombreUser`) 
        VALUES(?,?,?)";
        $tempArr = array_values(array_splice($arr,1,3));
        $stm = $pdo->prepare($sql);
        $stm->execute($tempArr);
    }

}