<?php

  class Book{
    private $isbn;
    private $title;
    private $author;
    private $stock;
    private $price;

    public function __construct($isbn, $title, $author, $stock, $price){
      $this->isbn = $isbn;
      $this->title = $title;
      $this->author = $author;
      $this->stock = $stock;
      $this->price = $price;
    }

    public function getIsbn(){
      return $this->isbn;
    }

    public function getTitle(){
      return $this->title;
    }

    public function getAuthor(){
      return $this->author;
    }

    public function getStock(){
      return $this->stock;
    }

    public function getPrice(){
      return $this->price;
    }

    public function addBook($db){
      $conexion = $db->getConnection();
      $sql = "INSERT INTO book (isbn, title, author, stock, price) VALUES (?,?,?,?,?);";
      $statement = $conexion->prepare($sql);
      $statement->bindParam(1, $this->isbn);
      $statement->bindParam(2, $this->title);
      $statement->bindParam(3, $this->author);
      $statement->bindParam(4, $this->stock);
      $statement->bindParam(5, $this->price);
      $result = $statement->execute();
      return $result;
    }

    public function deleteBook($db, $id){
      $conexion = $db->getConnection();
      $sql =  "DELETE FROM book WHERE id=:id";
      $statement = $conexion->prepare($sql);
      $statement->bindValue(":id", $id);
      $statement->exectute();
    }

  }
?>