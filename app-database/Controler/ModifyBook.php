<?php

  require_once("../Model/DBConnect.php");
  require_once("../Model/Book.php");

  $db = DBConnect::getInstance("../Config/config.json");

  foreach($_POST as $clave => $valor){
    if($clave != "submit" && $clave!="id" && $valor!=""){
      Book::modifyBook($db, $_POST["id"], $clave, $valor);
    }
  }

  header("Location: ../View/Book.php");
?>