<?php

  if(isset($_POST["login"])){
    header("Location: ../View/login.php");
  }else{
    header("Location: ../View/listar.php");
  }

?>