<?php
  session_start();

  include "../../includes/autoloader.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  <h1>Paso 3: Elija las caracteristicas básicas de la vivienda</h1>

  <form action="../Controller/paso2.php">
    <br>
    <input type="submit" name="back" value="Anterior">
    <input type="submit" name="next" value="Siguiente">
  </form>

</body>
</html>