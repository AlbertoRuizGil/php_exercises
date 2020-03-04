<?php

  class Usuario {

    public static function comprobarUsuario($usuario, $email, $db){
      $conexion = $db->getConnection();
      $sql = "SELECT nombre, email FROM clientes WHERE nombre='$usuario' AND email='$email'";
      $statement = $conexion->prepare($sql);
      $statement->execute();
      if($statement->rowcount()==0){
        return false;
      }else{
        return true;
      }
    }

    public static function cogerDireccion($usuario, $email, $db){
      $conexion = $db->getConnection();
      $sql = "SELECT direccion FROM clientes WHERE nombre='$usuario' AND email='$email'";
      $statement = $conexion->prepare($sql);
      $statement->execute();
      $arrTemp = $statement->fetchAll();
      return $arrTemp[0]["direccion"];
    }

    public static function cogerID($usuario, $email, $db){
      $conexion = $db->getConnection();
      $sql = "SELECT id FROM clientes WHERE nombre='$usuario' AND email='$email'";
      $statement = $conexion->prepare($sql);
      $statement->execute();
      $arrTemp = $statement->fetchAll();
      return $arrTemp[0]["id"];
    }

  }

?>