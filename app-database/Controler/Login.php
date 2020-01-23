<?php
  session_start();
  require_once("../Model/Login.php");
  require_once("../Model/DBConnect.php");
  require_once("../Model/Customer.php");

  $_SESSION["user"] = $_POST["user"];
  $_SESSION["modify"] = false;

  $db = DBConnect::getInstance("../Config/config.json");

  $user = new Login($_POST["user"], $_POST["password"]);
  $check = $user->checkUser($db);

  

  if($check){
    $susbscription = Customer::getSubscriptionByUser($db, $_POST["user"]);
    $_SESSION["type"] = $susbscription;
    header("Location: ../View/Customer.php");
  }else{
    header("Location: ../View/Register.php");
  }

?>