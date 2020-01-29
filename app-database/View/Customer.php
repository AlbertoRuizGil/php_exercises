<?php
  session_start();

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
  <div class="Customer-mainbox">
    <div class="Customer-mainbox-allbtns">
      <?php
        if($_SESSION["type"]=="premium"){
          echo "<a href='../View/Book.php' class='Customer-mainbox-allbtns-btn'>Libros</a>";
        }
      ?>
      <a href="./Sale.php" class="Customer-mainbox-allbtns-btn">Comprar</a>
      <a href="./Borrowed_books.php" class="Customer-mainbox-allbtns-btn">Alquilar</a>
      <a href="" class="Customer-mainbox-allbtns-btn">Mis préstamos</a>
    </div>
  </div>
    
  <div class="Customer-exit">
    <a href="../Controler/Exit.php" class="Customer-exit-btn">Cerrar sesión</a>
  </div>
  
  
</body>
</html>


