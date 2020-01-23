<?php
  require_once("../Model/Book.php");
  require_once("../Model/DBConnect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../CSS/style.css">
  <title>Document</title>
</head>
<body>

  <?php
    $db = DBConnect::getInstance("../Config/config.json");
    $arr = Book::getOneBook($db, $_POST["id"]);
    Book::paintOneBook($arr);
  ?>

  
</body>
</html>