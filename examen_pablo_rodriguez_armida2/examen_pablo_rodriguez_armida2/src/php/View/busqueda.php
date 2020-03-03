<?php
require "../Model/Connection.php";
require "../Model/Viviendas.php";
error_reporting(1);

$confPath = "../../conf/config.json";
$con = new Connection($confPath);
$pdo=$con->getPdo();

session_start();
$_SESSION["garage"] = $_POST["garage"];
$_SESSION["jardin"] = $_POST["jardin"];
$_SESSION["padel"] = $_POST["padel"];
$_SESSION["piscina"] = $_POST["piscina"];
$_SESSION["zonascomunes"] = $_POST["zonascomunes"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <a href="./filtro1.php">Nueva búsqueda</a>
    <table>
    <?php
        echo "<tr>";
        echo "<th>tipo</th>";
        echo "<th>zona</th>";
        echo "<th>precio</th>";
        echo "<th>dormitorios</th>";
        echo "<th>garage</th>";
        echo "<th>jardin</th>";
        echo "<th>padel</th>";
        echo "<th>piscina</th>";
        echo "<th>zonascomunes</th>";
        echo "<th>imagen</th>";
        echo "<th>comprar</th>";
        echo "</tr>";
        $viviendas = new Viviendas();
        $arrV = $viviendas->getViviendas($pdo, [
$_SESSION["tipo"],
$_SESSION["zona"],
$_SESSION["dormitorios"],
$_SESSION["precio"],
$_SESSION["garage"],
$_SESSION["jardin"],
$_SESSION["padel"],
$_SESSION["piscina"],
$_SESSION["zonascomunes"]
]);
        foreach ($arrV as $v) {
            echo "<tr>";
            echo "<form action='../Controller/CompraController.php' method='post'>";
            echo "<td>$v->tipo</td>";
            echo "<td>$v->zona</td>";
            echo "<td>$v->dormitorios</td>";
            echo "<td>$v->garage</td>";
            echo "<td>$v->jardin</td>";
            echo "<td>$v->padel</td>";
            echo "<td>$v->piscina</td>";
            echo "<td>$v->zonascomunes</td>";
            echo "<td><img src='data:;base64," . base64_encode($v->imagen) ."'/></td>";
            echo "<td>si<input type='radio' value='si' name='check'/>";
            echo "no<input checked type='radio' value='no' name='check'/>";
            echo "<td><input type='submit' value='Comprar'></td>";
            echo "<input type='hidden' value='$v->id' name='id'/>";
            echo "</form>";
            echo "</tr>";
        }
    ?>
    </table>

<?php session_destroy()
?>
</body>
</html>
