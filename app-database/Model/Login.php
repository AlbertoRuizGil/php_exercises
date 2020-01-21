<?php

  class Login{
    private $user;
    private $password;

    public function __construct($user, $password){
      $this->user = $user;
      $this->password = $password;
    }

    public function checkUser($db){
      $conexion = $db->getConnection();
      $sql = "SELECT user,pass FROM customer WHERE user= :login AND pass= :password";
      $statement = $conexion->prepare($sql);
      $statement->bindValue(":login", $this->user);
      $statement->bindValue(":password", $this->password);
      $statement->execute();

      $rows = $statement->rowCount();

      if($rows !=0){
        return true;
      }
      return false;

    }
  }

?>