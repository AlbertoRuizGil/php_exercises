<?php
  session_start();
  
  require_once("../Model/Book.php");
  require_once("../Model/DBConnect.php");

  $db = DBConnect::getInstance("../Config/config.json");

  try{
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
    $_SESSION["modify"] = true;
  
    header("Location: ../View/Book.php");
  }catch(Exception $e){
    echo "<h1>" . $e->getMessage() . "</h1>";
    header("Refresh:5; url=../View/Book.php");
  }
  
?>