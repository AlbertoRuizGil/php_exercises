<?php
  session_start();
  require_once("../Model/Login.php");
  require_once("../Model/DBConnect.php");
  require_once("../Model/Customer.php");
  $_SESSION["error_message"] = null;

  $_SESSION["user"] = $_POST["user"];
  $_SESSION["modify"] = false;

  $db = DBConnect::getInstance("../Config/config.json");

  $user = new Login($_POST["user"], $_POST["password"]);
  try{
    $check = $user->checkUser($db);
    if($check){
      $_SESSION["id_customer"] = Customer::getId($db, $_POST["user"]);
      $susbscription = Customer::getSubscriptionByUser($db, $_POST["user"]);
      $_SESSION["type"] = $susbscription;
      header("Location: ../View/Customer.php");
    }else{
      header("Location: ../View/Register.php");
    }
  }catch(Exception $e){
    echo $e->getMessage() . ". Será redirigido al inicio en 5 segundos";
    header("Refresh:5; url=../index.php");
  }
  

  

?>