<?php
  session_start();

  include "../../includes/autoloader.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>COMPRA</h1>

  <?php
    if(isset($_SESSION["usuario"])){
      if(!isset($_SESSION["cesta"])){
        $cesta = new Cesta();
        $cesta = serialize($cesta);
        $_SESSION["cesta"] = $cesta;
      }
      echo "<p>Bienvenido " . $_SESSION["usuario"] . "</p>";
      echo <<<EOD
      <form action='../Controller/controller_lista.php' method='post'>
        <input type='submit' name='logout' value='Logout'>
        <input type='submit' name='cesta' value='Ver Cesta'>
      </form><br>
EOD;
    }
    /* if(!isset($_COOKIE["paginas"])){
      echo <<<EOD
      <h2>Productos por página</h2>
      <form action='../Controller/controller_lista.php' method='post'>
        <input type='submit' name='pagina2' value='2'>
        <input type='submit' name='pagina4' value='4'>
      </form><br>
EOD;
    }else{ */
      $db = DBConnect::getInstance("../../config/config.json");
      $arrProductos = Producto::obtenerProductos($db, 2);
      for($i=0; $i<count($arrProductos); $i++){
        echo <<<EOD
        <div class='producto'>
          <img src='../../{$arrProductos[$i]['imagen']}'/>
          <p>{$arrProductos[$i]['nombre']}</p>
          <p>{$arrProductos[$i]['descripcion']}</p>
          <p>{$arrProductos[$i]['precio']}</p>
          <form action='../View/mostrar_producto.php' method='post'>
            <input type='hidden' value='{$arrProductos[$i]['codigo_producto']}' name='producto'>
            <input type='submit' value='Ver producto'>
          </form>
        </div>
EOD;
      }
    /* } */
    ?>
  
</body>
</html>