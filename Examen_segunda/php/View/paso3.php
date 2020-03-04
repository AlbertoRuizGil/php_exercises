<?php
  session_start();
  require_once("../Model/forms.php");

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

  pintaPaso3();

  echo "Buscando " . $_SESSION["tipo"] . " en " . $_SESSION["localidad"];
  

?>
  
  
</body>
</html>