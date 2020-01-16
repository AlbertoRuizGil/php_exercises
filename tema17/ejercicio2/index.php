<?php

  require_once("./Classes/DBConnect.php");
  require_once("./Config/Create.php");

  createdb("./Config/config.json");

  $conexion = new DBConnect("./Config/config.json");

  /*Comentado $sql = 'CREATE TABLE IF NOT EXISTS libro()'; */

  $sql = file_get_contents("./Config/database.sql");

  $conexion->exec($sql);

  echo "tabla creada";

  $conexion = null;  */

?>