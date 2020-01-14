<?php

  require_once("DBConnect.php");

  $conexion = new DBConnect("./Config/config.json");

  $sql = 'CREATE TABLE IF NOT EXISTS libro()';

  $conexion->exec($sql);

  echo "tabla creada";

  $conexion = null;


?>