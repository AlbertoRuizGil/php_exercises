<?php
  session_start();
  require_once("../Model/DBConnect.php");
  require_once("../Model/Sale.php");
  require_once("../Model/Sale_book.php");
  require_once("../Model/Book.php");

  $db = DBConnect::getInstance("../Config/config.json");

  $check = Book::setStock($db, $_POST["id"], $_POST["amount"]);

  if($check){
    $date = new DateTime();
    $sale = new Sale($_SESSION["id_customer"], $date->format("Y-m-d H:i:s"));
    $sale->addSale($db);

    $last_insert_id = $sale->getLastId($db, $_SESSION["id_customer"], $sale->getSaleDate());
    
    $sale_book = new Sale_book($_POST["id"], $last_insert_id, $_POST["amount"]);
    $sale_book->addSale_book($db);
  }else{
    echo "Sin stock";
  }

  header("Location: ../View/Sale.php");


?>