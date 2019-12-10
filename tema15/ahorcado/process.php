<?php
  session_start();

  $pushedkeys=$_SESSION["pushedkeys"];
  array_push($pushedkeys, $_POST["char"]);
  $_SESSION["pushedkeys"]=$pushedkeys;

  header("Location: ahorcado.php");

?>