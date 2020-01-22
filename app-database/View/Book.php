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

  <div class="Book-insert">
      <form action="../Controler/Book.php" method="post">
        <label for="isbn">ISBN</label>
        <input type="text" name="isbn">
        <label for="title">Título</label>
        <input type="text" name="title">
        <label for="author">Autor</label>
        <input type="text" name="author">
        <label for="stock">Stock</label>
        <input type="number" name="stock">
        <label for="price">Precio</label>
        <input type="number" name="price">
        <input type="submit" class="Book-insert-submit" value="Añadir">
      </form>
  </div>

  <div class="Book-table">

  </div>
  <div class="Book-exit">
    <a href="../View/Customer.php" class="Book-exit-btn">Volver</a>
    <a href="../Controler/Exit.php" class="Book-exit-btn">Cerrar sesión</a>
  </div>
</body>
</html>