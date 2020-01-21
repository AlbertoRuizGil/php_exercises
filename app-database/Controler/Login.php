<?php
  session_start();
  require_once("../Model/Login.php");
  require_once("../Model/DBConnect.php");

  $_SESSION["user"] = $_POST["user"];

  $db = DBConnect::getInstance("../Config/config.json");

  $user = new Login($_POST["user"], $_POST["password"]);
  $check = $user->checkUser($db);

  if($check){
    header("Location: ../View/Customer.php");
  }else{
    header("Location: ../View/Register.php");
  }

?>