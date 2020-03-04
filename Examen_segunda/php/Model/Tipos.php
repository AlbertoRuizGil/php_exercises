<?php

  class Tipos{
    private $tipo;

    public function __construct($tipo){
      $this->tipo;
    }

    public static function todoTipos($db){
      $conexion = $db->getConection();
      $sql = "SELECT * FROM tipos";
      $statement = $conexion->prepare($sql);
      $statement->execute();
      $arr = $statement->fetchAll();

      return $arr;
    }

  }


?>