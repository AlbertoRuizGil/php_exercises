<?php

  session_start();

  require_once("../Model/DBConnect.php");

  $db = DBConnect::getInstance("../Config/config.json");
  $sql = "";
  if(isset($_POST["save"])){
    $sql = "COMMIT;";
  }else if(isset($_POST["undo"])){
    $sql = "ROLLBACK;";
  }

  $db->exec($sql);

  $_SESSION["modify"] = false;

  header("Location: ../View/Book.php");

?>