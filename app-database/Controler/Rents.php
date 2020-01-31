<?php

  session_start();
  require_once("../Model/DBConnect.php");
  require_once("../Model/Borrowed_books.php");

  $db = DBConnect::getInstance("../Config/config.json");
  $date = new DateTime();

  Borrowed_books::returnBorrowed_books($db, 
  $_POST["id"], 
  $_SESSION["id_customer"],
  $date->format("Y-m-d H:i:s"));

  header("Location: ../View/Rents.php");
?>