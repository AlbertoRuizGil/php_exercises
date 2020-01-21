<?php

  class Login {
    private $user;
    private $password;

    public function __construct($user, $password){
      $this->user = $user;
      $this->password = $password;
    }

    public function getUser(){
      return $this->user;
    }

    public function getPassword(){
      return $this->password;
    }

    public function checkUser($db){
      $sql = "SELECT user,pass FROM customer where user=: ";
      $connection = $db->getConnection();

    }
  }

?>