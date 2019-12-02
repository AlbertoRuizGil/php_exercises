<?php
  require("functions.php");
  require("users.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <?php

    $isnameright="";
    $ispasswdright="";
    $placename="Usuario";
    $placepasswd="Contraseña";
    if(!isset($_COOKIE["user"])){
      if(!isset($_POST["submit"])){
        if(isset($_COOKIE["isnameright"])){
          $isnameright=$_COOKIE["isnameright"];
          $placename=$_COOKIE["placename"];
        }
        if(isset($_COOKIE["ispasswdright"])){
          $ispasswdright=$_COOKIE["ispasswdright"];
          $placepasswd=$_COOKIE["placepasswd"];
        }
        paintForm($isnameright, $ispasswdright, $placename, $placepasswd);
        var_dump($users);
      }else{
        checkUser($_POST["name"], $_POST["passwd"]);
      }
    }else{
      header("Location: pageuser.php");
    }

  ?>
    
</body>
</html>