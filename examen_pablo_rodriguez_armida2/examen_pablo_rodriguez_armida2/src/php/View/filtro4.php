<?php
session_start();
error_reporting(1);
if (isset($_POST["dormitorios"])) {
    $_SESSION["dormitorios"] = $_POST["dormitorios"];
}
if (isset($_POST["precio"])) {
    $_SESSION["precio"] = $_POST["precio"];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Búsqueda de viviendas</h1>
    <span>1.Tipo > 2.>Zona > 3.Características > <b>4.Extras</b></span>
    <h3>Paso 4: Elija los extras</h3>
    <form action="./busqueda.php" method="post">
        <b>Extras: </b><br>
        Garage:
        <?php
        if ($_SESSION["garage"] === "si") {
            echo "<input checked type='checkbox' name='garage' value='si'>";
        } else {
            echo "<input type='checkbox' name='garage' value='si'>";
        }
        ?>
        <br>

        Jardin:
        <?php
        if ($_SESSION["jardin"] === "si") {
            echo "<input checked type='checkbox' name='jardin' value='si'>";
        } else {
            echo "<input type='checkbox' name='jardin' value='si'> ";
        }
        ?>
        <br>
        Padel:
        <?php
        if ($_SESSION["padel"] === "si") {
            echo "<input checked type='checkbox' name='padel' value='si'>";
        } else {
            echo "<input type='checkbox' name='padel' value='si'> ";
        }
        ?>
        <br>
        Piscina:
        <?php
        if ($_SESSION["piscina"] === "si") {
            echo "<input checked type='checkbox' name='piscina' value='si'>";
        } else {
            echo "<input type='checkbox' name='piscina' value='si'>";
        }
        ?>
        <br>
        Zonascomunes:
        <?php
        if ($_SESSION["zonascomunes"] === "si") {
            echo "<input checked type='checkbox' name='zonascomunes' value='si'>";
        } else {
            echo "<input type='checkbox' name='zonascomunes' value='si'>";
        }
        ?>
        <br>

        <a href="./filtro3.php">Anterior</a>
        <input type="submit" value="Siguiente">
    </form>
</body>

</html>