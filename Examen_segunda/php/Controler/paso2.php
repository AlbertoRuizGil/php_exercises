<?php
  session_start();

  if(isset($_POST["next"])){
    $_SESSION["localidad"] = $_POST["localidad"];
    header("Location: ../View/paso3.php");
  }else{
    $_SESSION["tipo"]="";
    header("Location: ../../index.php");
  }


?>


