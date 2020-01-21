<?php

  class Customer{
    private $firstname;
    private $surname;
    private $email;
    private $user;
    private $pass;
    private $type;

    public function __construct($firstname, $surname, $email, $user, $pass, $type){
      $this->firstname = $firstname;
      $this->surname = $surname;
      $this->email = $email;
      $this->user = $user;
      $this->type = $type;
      $pass = md5($pass);
      $this->pass = $pass;
    }

    public getFirstname(){
      return $this->firstname;
    }

    public getSurname(){
      return $this->surname;
    }

    public getEmail(){
      return $this->email;
    }

    public getUser(){
      return $this->user;
    }

    public getPass(){
      return $this->pass;
    }

    public getType(){
      return $this->type;
    }

    public function addCustomer($db){
      $conexion = $db->getConnection();
      $sql = "INSERT INTO customer VALUES (":firstname", ":surname", ":email", ":user", ":pass", ":type")";
      $statement = $conexion->prepare($sql);
      $statement->bindValue(":firstname", $this->firstname);
      $statement->bindValue(":surname", $this->surname);
      $statement->bindValue(":email", $this->email);
      $statement->bindValue(":user", $this->user);
      $statement->bindValue(":pass", $this->pass);
      $statement->bindValue(":type", $this->type);


    }
  }

?>