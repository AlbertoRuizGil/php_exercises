<?php
  session_start();
  require_once("../Model/Sale.php");
  require_once("../Model/Sale_book.php");

  $date = new DateTime();
  $sale = new Sale($_SESSION["id_customer"], $date->format("Y-m-d H:i:s"));
  $sale_book = new Sale_book($_POST["id"], $sale->getId)


?>