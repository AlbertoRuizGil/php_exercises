<?php
  session_start();
  require_once("../Model/Customer.php");
  require_once("../Model/DBConnect.php");

  $_SESSION["user"] = $_POST["user"];

  $customer = new Customer(
    $_POST["firstname"],
    $_POST["surname"],
    $_POST["email"],
    $_POST["user"],
    $_POST["password"],
    $_POST["type"]
  );
  $db = DBConnect::getInstance("../Config/config.json");
  $customer->addCustomer($db);

  $_SESSION["type"] = $_POST["type"];
  
  header("Location: ../View/Customer.php");

?>