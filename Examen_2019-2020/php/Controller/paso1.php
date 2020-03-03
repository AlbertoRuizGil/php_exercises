<?php
  session_start();

  $_SESSION["tipo"] = $_POST["tipo"];

  header("Location: ../View/paso2.php");

?>