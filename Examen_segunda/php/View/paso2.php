<?php
  session_start();

  require_once("../Model/DBConection.php");
  require_once("../Model/forms.php");
  require_once("../Model/Localidades.php");

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
    $db = DBConection::getInstance("../../config/config.json");
    pintaPaso2($db);
    echo "Buscando " . $_SESSION["tipo"];
  ?>
  
</body>
</html>