<?php
  session_start();

  $checkUser = false;
  $usuarios_doc = new DOMDocument; 
  $usuarios_doc->load("../../xml/usuarios.xml");
  $usuarios = $usuarios_doc->documentElement;
  $list = $usuarios->getElementsByTagName('usuario');

  foreach($list as $usuario){
    $user = $usuario->getElementsByTagName("nombreUser")->item(0)->textContent;
    $pass = $usuario->getElementsByTagName("pass")->item(0)->textContent;
    $email = $usuario->getElementsByTagName("mail")->item(0)->textContent;

    echo $user . " " . $pass . " ";

    if($user == $_POST["user"] && $pass == $_POST["passwd"] && $email == $_POST["email"]){
      $checkUser = true;
      $_SESSION["user"] = $user;
      header("Location: ./venta.php");
    }
  }
  echo "<h1>No es correcto, introduzca un usuario y contraseña válidos</h1>";
  header("refresh:5; url=../View/Login.php");

?>