<?php

class Viviendas
{
    public function __construct()
    {
    }

    public function insert($pdo, $arr)
    {
        $tempArr = array_values($arr);
        $tempArr[4] = file_get_contents($tempArr[4]);

        $sql = "INSERT INTO `viviendas` (`tipo`,`zona`,`dormitorios`,`precio`,`imagen`,`garage`,`jardin`,`padel`,`piscina`,`zonascomunes`) 
        VALUES(?,?,?,?,?,?,?,?,?,?)";

        $stm = $pdo->prepare($sql);
        $stm->execute($tempArr);
    }

    public function getViviendas($pdo, $arr)
    {
        $tempArr = array_values($arr);
        $tempArr[2] = (int) $tempArr[2];
        $tempArr[3] = (int) $tempArr[3];

        $sql = "SELECT * FROM `viviendas` WHERE tipo=? AND zona=? AND dormitorios=?";

        if($tempArr[3] === 100000){
            $sql .= " AND precio<=100000";
        }
        if($tempArr[3] === 150000){
            $sql .= " AND precio<=200000 AND precio>=100000";
        }
        if($tempArr[3] === 250000){
            $sql .= " AND precio<=300000 AND precio>=200000";
        }
        if($tempArr[3] === 300000){
            $sql .= " AND precio>=300000";
        }

        $tempArr[4] && $sql .= " AND garage='si'";
        $tempArr[5] && $sql .= " AND jardin='si'";
        $tempArr[6] && $sql .= " AND padel='si'";
        $tempArr[7] && $sql .= " AND piscina='si'";
        $tempArr[8] && $sql .= " AND zonascomunes='si'";

        $basics = array_splice($tempArr, 0, 3);
        $stm = $pdo->prepare($sql);
        $stm->execute($basics);
        return $stm->fetchAll();
    }

    public function getViviendasByID($pdo, $arr)
    {
        $tempArr = "(" . join(",", $arr) . ")";
        $sql = "SELECT tipo, zona, precio, dormitorios, garage, jardin, padel, piscina, zonascomunes FROM `viviendas` WHERE id in $tempArr";
        $stm = $pdo->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
}
