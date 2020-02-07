<?php

  require_once("./View/Login.php");
  require_once("./Model/DBConnect.php");
  require_once("./Model/DBCreation.php");

  createdb("./Config/config.json");
  createtables("./Config/database.sql");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>

  <?php
    paintFormIndex();

  ?>
  
</body>
</html>