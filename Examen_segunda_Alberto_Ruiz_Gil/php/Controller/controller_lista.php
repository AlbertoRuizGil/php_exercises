<?php
  session_start();

  if(isset($_POST["pagina2"])){
    setcookie("paginas", $_POST["pagina2"], time()+60);
    header("Location: ../View/listar.php");
  }
  if(isset($_POST["pagina4"])){
    setcookie("paginas", $_POST["pagina4"], time()+60);
    header("Location: ../View/listar.php");
  }

  if(isset($_POST["logout"])){
    unset($_SESSION["cesta"]);
    unset($_SESSION["usuario"]);
    unset($_SESSION["paginas"]);
    session_destroy();
    header("Location: ../../index.php");
  }

  if(isset($_POST["cesta"])){
    header("Location: ../View/cesta.php");
  }

?>