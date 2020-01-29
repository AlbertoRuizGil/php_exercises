<?php

  session_start();
  require_once("../Model/DBConnect.php");
  require_once("../Model/Borrowed_books.php");
  require_once("../Model/Book.php");

  $date = new DateTime();
  $db = DBConnect::getInstance("../Config/config.json");
  $borrow = new Borrowed_books($_SESSION["id_customer"], $_POST["id"], $date->format("Y-m-d H:i:s"), null);
  $borrow->addBorrowed_books($db);
  Book::setStock($db, $_POST["id"], 1);

  header("Location: ../View/Borrowed_books.php");

  
?>