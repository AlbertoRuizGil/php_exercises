<?php
  session_start();
  require_once("../Model/DBConnect.php");
  require_once("../Model/Login.php");

  $customer = new Customer();

  $result = checkUser();

  $customer->sqlconstruct($result);
  
?>