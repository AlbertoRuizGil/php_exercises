<?php

  class Customer{
    private $firstname;
    private $surname;
    private $email;
    private $user;
    private $pass;
    private $subscription;

    public function __construct($firstname, $surname, $email, $user, $pass, $subscription){
      $this->firstname = $firstname;
      $this->surname = $surname;
      $this->email = $email;
      $this->user = $user;
      $this->subscription = $subscription;
      $pass = md5($pass);
      $this->pass = $pass;
    }

    public function getFirstname(){
      return $this->firstname;
    }

    public function getSurname(){
      return $this->surname;
    }

    public function getEmail(){
      return $this->email;
    }

    public function getUser(){
      return $this->user;
    }

    public function getPass(){
      return $this->pass;
    }

    public function getSubscription(){
      return $this->subscription;
    }

    public function addCustomer($db){
      $conexion = $db->getConnection();
      $sql = "INSERT INTO customer (firstname, surname, email, user, pass, subscription) VALUES (?,?,?,?,?,?);";
      $statement = $conexion->prepare($sql);
      $statement->bindParam(1, $this->firstname);
      $statement->bindParam(2, $this->surname);
      $statement->bindParam(3, $this->email);
      $statement->bindParam(4, $this->user);
      $statement->bindParam(5, $this->pass);
      $statement->bindParam(6, $this->subscription);
      $result = $statement->execute();
      return $result;
    }

    public static function getSubscriptionByUser($db, $user){
      $conexion = $db->getConnection();
      $sql = "SELECT subscription FROM customer WHERE user= :login";
      $statement = $conexion->prepare($sql);
      $statement->bindValue(":login", $user);
      $statement->execute();
      $result = $statement->fetch(PDO::FETCH_ASSOC);
      return $result["subscription"];
    }
  }

?>