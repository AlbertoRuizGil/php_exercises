<?php
  session_start();
  require_once("../Model/DBConnect.php");
  require_once("../Model/Book.php");
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
  <div class="Book-exit">
    <a href="../View/Customer.php" class="Book-exit-btn">Volver</a>
    <a href="../Controler/Exit.php" class="Book-exit-btn">Cerrar sesión</a>
    <?php
      if($_SESSION["modify"] == true){
        echo <<<EOD
        <form action="../Controler/Changes.php" method="post">
          <input type="submit" class='Book-exit-btn' name="save" value="Guardar cambios">
          <input type="submit" class='Book-exit-btn' name="undo" value="Deshacer cambios">
        </form>
EOD;
      }
    ?>
  </div>
  

  <div class="Book-insert">
      <form action="../Controler/Book.php" method="post">
        <label for="isbn">ISBN</label>
        <input type="text" name="isbn" required>
        <label for="title">Título</label>
        <input type="text" name="title" required>
        <label for="author">Autor</label>
        <input type="text" name="author" required>
        <label for="stock">Stock</label>
        <input type="number" name="stock" required>
        <label for="price">Precio</label>
        <input type="number" step=".01" name="price" required>
        <input type="submit" class="Book-insert-submit" value="Añadir" name="add">
      </form>
  </div>

  <div class="Book-table">
    <?php
      $db = DBConnect::getInstance("../Config/config.json");
      $arr = Book::getAllBooks($db);
      Book::paintAllBooks($arr, "books");
    ?>

  </div>
</body>
</html>

