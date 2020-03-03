<?php

  session_start();

  if(isset($_POST["next"])){
    $_SESSION["zona"] = $_POST["zona"];
    header("Location: ../View/paso3.php");
  }else{
    header("Location: ../View/paso1.php");
  }
  

?>