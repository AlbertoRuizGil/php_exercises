<?php
require "./src/php/Model/Connection.php";
require "./src/php/Model/Viviendas.php";
require "./src/php/Model/Usuarios.php";

function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    $date = date('l jS \of F Y h:i:s A');
    $errorlog = ["Message" => $errstr, "File" => $errfile, "Line" => $errline, "Code" => $errno,  "Date" => $date];
    $log = json_encode($errorlog, true);
    error_log($log, 3, "logs/error.log");
}
function myExceptionHandler($ex)
{
    //El código de error de que una base de datos no existe es 1049
    if ($ex->getCode() === 1049) {
        $sqlFile = "./src/sql/inmobiliaria.sql";
        $confPath = "./src/conf/config.json";
        Connection::createDB($sqlFile, $confPath);
        header("Location: ./index.php");
    } else {
        $date = date('l jS \of F Y h:i:s A');
        $exArr = ["Message" => $ex->getMessage(), "File" => $ex->getFile(), "Line" => $ex->getLine(), "Code" => $ex->getCode(), "Date" => $date];
        $log = json_encode($exArr, true);
        error_log($log, 3, "logs/exception.log");
    }
}

set_error_handler("myErrorHandler");
set_exception_handler("myExceptionHandler");

function xml_to_arr($path, $root)
{
    if (file_exists($path)) {
        $xmlFile = simplexml_load_file($path);
        $xml = json_encode($xmlFile);
        $arrXml = json_decode($xml, true);
        return $arrXml[$root];
    } else {
        return [];
    }
}

function flatten($arr)
{
    $tempArr = [];
    $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($arr));
    foreach ($it as $k => $v) {
        $tempArr[$k] = $v;
    }
    return $tempArr;
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

    <?php
    $confPath = "./src/conf/config.json";
    $con = new Connection($confPath);
    $pdo = $con->getPdo();
    $path = "./src/xml/usuarios.xml";
    $arr = xml_to_arr($path, 'usuario');
    $usuario = new Usuarios();
    foreach ($arr as $v) {
        $f = flatten($v);
        $usuario->insert($pdo, $f);
    }
    $vivienda = new Viviendas();
    $path = "./src/xml/viviendas.xml";
    $arr = xml_to_arr($path, 'vivienda');
    foreach ($arr as $v) {
        $f = flatten($v);
        $vivienda->insert($pdo, $f);
    }
    header("Location: ./src/php/View/filtro1.php");
    ?>

</body>

</html>