<?php
  session_start();

  if($_POST["comprar"] == "si"){
    $_SESSION["id_casa"] = $_POST["id_casa"];
    header("Location: ../View/Login.php");
  }else{
    header("Location: ../../index.php");
  }

?>