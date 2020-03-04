<?php
  session_start();

  $_SESSION["tipo"] = $_POST["tipo"];
  if(isset($_SESSION["localidad"])){
    $_SESSION["localidad"]="";
  }

  header("Location: ../View/paso2.php");

?>