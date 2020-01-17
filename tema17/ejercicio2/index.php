<?php

  require_once("./Classes/DBConnect.php");
  require_once("./Config/Create.php");
  require("./View/Login.php");

  createdb("./Config/config.json");
  createtables("./Config/database.sql");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./View/style.css">
  <title>Libreria</title>
</head>
<body>
  
  <?php
    paintFormIndex();
  ?>

</body>
</html>