<?php
  session_start();
  require_once("../Model/Vivienda.php");
  require_once("../Model/forms.php");
  require_once("../Model/DBConection.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../css/style.css">
</head>
<body>

  <?php
    $db = DBConection::getInstance("../../config/config.json");
    $extras = array(
      "garaje"=>$_SESSION["garaje"],
      "piscina"=>$_SESSION["piscina"],
      "zonascomunes"=>$_SESSION["zonascomunes"],
      "padel"=>$_SESSION["padel"],
      "jardin"=>$_SESSION["jardin"],
    );

    $arr = Vivienda::buscarViviendas($db, $_SESSION["tipo"], $_SESSION["localidad"], $_SESSION["dormitorios"], $_SESSION["precio"], $extras);
    if($arr == null){
      echo "No hay casas con esas características";
      header("Location: ../../index.php");
    }else{
      pintaCasas($arr);
    }
    

  ?>
  
</body>
</html>