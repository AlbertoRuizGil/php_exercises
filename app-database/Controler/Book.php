<?php
  require_once("../Model/Book.php");
  require_once("../Model/DBConnect.php");

  $db = DBConnect::getInstance("../Config/config.json");

  if(isset($_POST["add"])){
    $book = new Book (
      $_POST["isbn"],
      $_POST["title"],
      $_POST["author"],
      $_POST["stock"],
      $_POST["price"]
    );
    $book->addBook($db);
  }
  
  if(isset($_POST["delete"])){
    Book::deleteBook($db, $_POST["id"]);
  }

  header("Location: ../View/Book.php");
?>