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
  
  <h1>Paso 2: Elija la zona de la vivienda</h1>

  <form action="../Controller/paso2.php" method="post">
    <select name="zona">
      <?php
        $db = new DBConnect("../../config/config.json");
        $zonas = new Zonas();
        $arrZonas = $zonas->getZonas($db);
        for($i=0; $i<count($arrZonas); $i++) {
            $zona = strtolower($arrZonas[$i]["zona"]);
            if (isset($_SESSION["zona"]) && $_SESSION["zona"] === $zona) {
                echo "<option selected value='$zona'>{{$arrZonas[$i]["zona"]}</option>";
            } else {
                echo "<option value='$zona'>{$arrZonas[$i]["zona"]}</option>";
            }
        }
      ?>
    </select><br>
    <input type="submit" name="back" value="Anterior">
    <input type="submit" name="next" value="Siguiente">
  </form>
</body>
</html>