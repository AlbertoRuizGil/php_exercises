<?php
  session_start();

  if(isset($_POST["next"])){
    
    if(isset($_POST["garaje"])){
      $_SESSION["garaje"] = "si";
    } else {
      $_SESSION["garaje"] = "no";
    }

    if(isset($_POST["piscina"])){
      $_SESSION["piscina"] = "si";
    } else {
      $_SESSION["piscina"] = "no";
    }

    if(isset($_POST["padel"])){
      $_SESSION["padel"] = "si";
    } else {
      $_SESSION["padel"] = "no";
    }

    if(isset($_POST["zonascomunes"])){
      $_SESSION["zonascomunes"] = "si";
    } else {
      $_SESSION["zonascomunes"] = "no";
    }

    if(isset($_POST["jardin"])){
      $_SESSION["jardin"] = "si";
    } else {
      $_SESSION["jardin"] = "no";
    }

    header("Location: ../View/compra.php");
    
  }else{
    $_SESSION["dormitorios"]="";
    $_SERVER["precio"]="";
    header("Location: ../View/paso3.php");
  }

?>