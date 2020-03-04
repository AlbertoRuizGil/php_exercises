<?php
  session_start();

  include "../../includes/autoloader.php";
  $producto = $_POST["producto"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $db = DBConnect::getInstance("../../config/config.json");
    $prod = Producto::obtenerUnProducto($db, $producto);
    echo $prod;
  ?>

  <a href="./listar.php">Volver</a>

  
</body>
</html>