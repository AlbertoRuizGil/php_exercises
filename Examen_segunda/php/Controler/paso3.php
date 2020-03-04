<?php
  session_start();

  if(isset($_POST["next"])){
    $_SESSION["dormitorios"] = $_POST["dormitorios"];
    $_SESSION["precio"] = $_POST["precio"];
    header("Location: ../View/paso4.php");
  }else{
    $_SESSION["localidad"]="";
    header("Location: ../View/paso2.php");
  }


?>
