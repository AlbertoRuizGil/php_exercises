<?php

  class Localidades{
    private $lugar;

    public function __construct($lugar){
      $this->lugar = $lugar;
    }

    public static function todoLocalidades($db){
      $conexion = $db->getConection();
      $sql = "SELECT * FROM localidades";
      $statement = $conexion->prepare($sql);
      $statement->execute();
      $arr = $statement->fetchAll();

      return $arr;
    }

  }


?>