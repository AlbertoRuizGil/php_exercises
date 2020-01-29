<?php

  class Borrowed_books{
    private $customer_id;
    private $book_id;
    private $borrowStart;
    private $borrowEnd;

    public function __construct($customer_id, $book_id, $borrowStart, $borrowEnd){
      $this->customer_id = $customer_id;
      $this->book_id = $book_id;
      $this->borrowStart = $borrowStart;
      $this->borrowEnd = $borrowEnd;
    }

    public function getCustomer_id(){
      return $this->customer_id;
    }

    public function getBook_id(){
      return $this->book_id;
    }

    public function getBorrowStart(){
      return $this->borrowStart;
    }

    public function getBorrowEnd(){
      return $this->borrowEnd;
    }

    public function setBorrowEnd($db, $customer_id, $book_id, $newValue){
      $conexion = $db->getConnection();
      $sql = "UPDATE book SET borrowEnd={$newvalue} WHERE customer_id= :customer AND book_id= :book";
      $statement = $conexion->prepare($sql);
      $statement->bindValue(":customer", $customer_id);
      $statement->bindValue("book", $book_id);
      $statement->execute();
    }

    public function addBorrowed_books($db){
      $conexion = $db->getConnection();
      $sql = "INSERT INTO borrowed_books (customer_id, book_id, borrowStart, borrowEnd) VALUES (?,?,?,?)";
      $statement = $conexion->prepare($sql);
      $statement->bindParam(1, $this->customer_id);
      $statement->bindParam(2, $this->book_id);
      $statement->bindParam(3, $this->borrowStart);
      $statement->bindParam(4, $this->borrowEnd);
      $statement->execute();
    }

    public function paintBorrowed_books($db){

    }
  }

?>