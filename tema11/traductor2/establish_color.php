<?php

  if(!isset($_POST["font"])){
    setcookie("font", "black", time()+60);
  } else{
    setcookie("font", $_POST["font"], time()+60);
  }
  if(!isset($_POST["background"])){
    setcookie("background", "white", time()+60);
  } else{
    setcookie("background", $_POST["background"], time()+60);
  }

  header("Location: index.php");

?>