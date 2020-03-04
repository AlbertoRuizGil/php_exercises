<?php
  session_start();

  include "../../includes/autoloader.php";

  $usuario = $_POST["usuario"];
  $email = $_POST["email"];
  
  $db = DBConnect::getInstance("../../config/config.json");

  if(Usuario::comprobarUsuario($usuario, $email, $db)){
    $_SESSION["usuario"] = $usuario;
    $_SESSION["email"] = $email;
    $cod_usuario = Usuario::cogerID($usuario, $email, $db);
    $_SESSION["cod_usuario"] = $cod_usuario;
    $direccion = Usuario::cogerDireccion($usuario, $email, $db);
    if($direccion != null){
      $_SESSION["direccion"] = $direccion; 
    }
    header("Location: ../View/listar.php");
  }else{
    $_SESSION["error"]="El usuario no existe";
    header("Location: ../View/login.php");
  }

?>