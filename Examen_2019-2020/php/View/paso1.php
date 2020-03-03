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
  
  <h1>Paso 1: Elija el tipo de vivienda</h1>

  <form action="../Controller/paso1.php" method="post">
    <select name="tipo">
      <?php
        $db = new DBConnect("../../config/config.json");
        $tipos = new Tipos();
        $arrTipos = $tipos->getTipos($db);
        for($i=0; $i<count($arrTipos); $i++) {
            $tipo = strtolower($arrTipos[$i]["tipo"]);
            if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] === $tipo) {
                echo "<option selected value='$tipo'>{$arrTipos[$i]["tipo"]}</option>";
            } else {
                echo "<option value='$tipo'>{$arrTipos[$i]["tipo"]}</option>";
            }
        }
      ?>
    </select><br>
    <input type="submit" name="next" value="Siguiente">
  </form>

</body>
</html>