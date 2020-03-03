<?php
session_start();

error_reporting(1);
if (isset($_POST["zona"])) {
    $_SESSION["zona"] = $_POST["zona"];
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
    <span>1.Tipo > 2.>Zona > <b>3.Características</b> > 4.Extras</span>
    <h3>Paso 3: Elija las características</h3>
    <form action="./filtro4.php" method="post">
        Dormitorios:

        <?php
        if (isset($_SESSION["dormitorios"]) && $_SESSION["dormitorios"] === "1") {
            echo "<input type='radio' checked name='dormitorios' value='1'>1</input>";
        } else {
            echo "<input type='radio' name='dormitorios' value='1'>1</input>";
        }
        ?>
        <?php
        if (isset($_SESSION["dormitorios"]) && $_SESSION["dormitorios"] === "2") {
            echo "<input type='radio' checked name='dormitorios' value='2'>2</input>";
        } else {
            echo "<input type='radio' name='dormitorios' value='2'>2</input>";
        }
        ?>
        <?php
        if (isset($_SESSION["dormitorios"]) && $_SESSION["dormitorios"] === "3") {
            echo "<input type='radio' checked name='dormitorios' value='3'>3</input>";
        } else {
            echo "<input type='radio' name='dormitorios' value='3'>3</input>";
        }
        ?>
        <?php
        if (isset($_SESSION["dormitorios"]) && $_SESSION["dormitorios"] === "4") {
            echo "<input type='radio' checked name='dormitorios' value='4'>4</input>";
        } else {
            echo "<input type='radio' name='dormitorios' value='4'>4</input>";
        }
        ?>
        <br>


        Precio€:
        <?php
        if (isset($_SESSION["precio"]) && $_SESSION["precio"] === "100000") {
            echo "<input type='radio' checked name='precio' value='100000'> <100000</input>";
        } else {
            echo "<input type='radio' name='precio' value='100000'> <100000</input>";
        }
        ?>
        <?php
        if (isset($_SESSION["precio"]) && $_SESSION["precio"] === "150000") {
            echo "<input type='radio' checked name='precio' value='150000'>100000-200000</input>";
        } else {
            echo "<input type='radio' name='precio' value='150000'>100000-200000</input>";
        }
        ?>
        <?php
        if (isset($_SESSION["precio"]) && $_SESSION["precio"] === "250000") {
            echo "<input type='radio' checked name='precio' value='250000'>200000-300000</input>";
        } else {
            echo "<input type='radio' name='precio' value='250000'>200000-300000</input>";
        }
        ?>
        <?php
        if (isset($_SESSION["precio"]) && $_SESSION["precio"] === "300000") {
            echo "<input type='radio' checked name='precio' value='300000'> >300000</input>";
        } else {
            echo "<input type='radio' name='precio' value='300000'> >300000</input>";
        }
        ?>

        <br>
        <a href="./filtro2.php">Anterior</a>
        <input type="submit" value="Siguiente">

    </form>
</body>

</html>