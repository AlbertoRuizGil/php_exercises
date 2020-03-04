<?php

  session_start();
  require_once("../Model/Vivienda.php");
  require_once("../Model/DBConection.php");
  
  $db = DBConection::getInstance("../../config/config.json");
  $arr = Vivienda::adquirirVivienda($db, $_SESSION["id_casa"]);
  
  $json = json_encode($arr);

  $file = fopen("../../json/ventas.json", "w");
  fwrite($file, $json);
  fclose($file);

  header("Location: ./SendMail.php");

?>