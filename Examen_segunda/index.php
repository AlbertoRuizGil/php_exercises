<?php
  session_start();
  require_once("./php/Model/DBConection.php");
  require_once("./php/Model/dbCreation.php");
  require_once("./php/Model/Vivienda.php");
  require_once("./php/Model/Tipos.php");
  require_once("./php/Model/forms.php");

  if(isset($_SESSION["tipo"])){
    $_SESSION["tipo"]="";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <div class="error">
  <?php
    
    try{//Comprobamos si existe base de datos
      $conexion = new DBConection("./config/config.json");
      $db = DBConection::getInstance("./config/config.json");
      pintaPaso1($db);
    }catch(PDOException $e){
      if($e->getCode() == 1049){
        try{
          createdb("./config/config.json");
          createtables("./config/viviendas.sql");
          $db = DBConection::getInstance("./config/config.json");
          Vivienda::recorrerXML("./xml/viviendas.xml", $db);
          pintaPaso1($db);
        }catch(PDOException $err){
          echo $err->getMessage();
        }
      }else{
        echo "<p>No se pudo conectar con el servidor</p>";
      }
    }

  ?>
  </div>
  
</body>
</html>