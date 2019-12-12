<?php
  session_start();

  $pushedkeys=$_SESSION["pushedkeys"];
  $fails = $_SESSION["fails"];
  array_push($pushedkeys, $_POST["char"]);
  if(!in_array(($_POST["char"]), $_SESSION["word"])){
     $fails++;
  }
  $_SESSION["fails"]=$fails;
  $_SESSION["pushedkeys"]=$pushedkeys;

  header("Location: ahorcado.php");

?>