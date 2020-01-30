<?php
  session_start();
  require_once("../Model/Borrowed_books.php");
  require_once("../Model/DBConnect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>

  <div class="Book-exit">
    <a href="../View/Customer.php" class="Book-exit-btn">Volver</a>
    <a href="../Controler/Exit.php" class="Book-exit-btn">Cerrar sesión</a>
  </div>
  
  <div class="Book-table">
    <?php
      $db = DBConnect::getInstance("../Config/config.json");
      $arr = Borrowed_books::getAllBorrowed_books($db, $_SESSION["id_customer"]);
      Borrowed_books::paintBorrowed_books($arr);
    ?>
  </div>

</body>
</html>