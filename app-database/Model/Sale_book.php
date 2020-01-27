<?php

  class Sale_book{
    private $book_id;
    private $sale_id;
    private $amount;

    public function __construct($book_id, $sale_id, $amount){
      $this->book_id = $book_id;
      $this->sale_id = $sale_id;
      $this->amount = $amount;
    }

    public function getBook_id(){
      return $this->book_id;
    }

    public function getSale_id(){
      return $this->sale_id;
    }

    public function getAmount(){
      return $this->amount;
    }

    public function addSale_book($db){
      $conexion = $db->getConnection();
      $sql = "INSERT INTO sale (book_id, sale_id, amount) VALUES (?,?,?)";
      $statement = $conexion->prepare($sql);
      $statement = bindParam(1, $this->book_id);
      $statement = bindParam(2, $this->sale_id);
      $statement = bindParam(3, $this->amount);
      $statement->execute();
    }
  }