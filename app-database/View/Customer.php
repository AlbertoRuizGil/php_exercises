<?php
  session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
  <a href="">Libros</a>
  <a href="">Alquilar</a>
  <a href="">Mis préstamos</a>
  <?php
    echo $_SESSION["user"];
  ?>

  <a href="../Controler/Exit.php">Cerrar sesión</a>
  
</body>
</html>


