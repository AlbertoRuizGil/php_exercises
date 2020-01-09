<?php

  define("SERVER","mysql:host=localhost");
  define("USER", "root");
  define("PASSWORD", "");
  try{
    $db = new PDO(SERVER, USER, PASSWORD);
    $db->query("CREATE DATABASE IF NOT EXISTS libreria");
    echo "Base de datos creada";
  } catch (PDOException $e){
    echo "Falló la conexión: " . $e->getMessage();
  }

  $db =  null;
  
  
  
?>

