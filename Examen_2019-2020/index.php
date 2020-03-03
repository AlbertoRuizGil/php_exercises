<?php

  include "./includes/autoloader.php";

  set_error_handler("myErrorHandler");
  set_exception_handler("myExceptionHandler");

  function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    $date = date('l jS \of F Y h:i:s A');
    $errorlog = ["Message" => $errstr, "File" => $errfile, "Line" => $errline, "Code" => $errno,  "Date" => $date];
    $log = json_encode($errorlog, true);
    error_log($log, 3, "logs/error.log");
}
function myExceptionHandler($ex)
{
    if ($ex->getCode() === 1049) {
        DBConnect::createdb("./config/config.json", "./sql/inmobiliaria.sql");
        header("Location: ./index.php");
    } else {
        $date = date('l jS \of F Y h:i:s A');
        $exArr = ["Message" => $ex->getMessage(), "File" => $ex->getFile(), "Line" => $ex->getLine(), "Code" => $ex->getCode(), "Date" => $date];
        $log = json_encode($exArr, true);
        error_log($log, 3, "logs/exception.log");
    }
}


  $db = new DBConnect("./config/config.json");
  Vivienda::recorrerXML("./xml/viviendas.xml", $db);
  Usuario::recorrerXML("./xml/usuarios.xml", $db);
  header("Location: ./php/View/paso1.php");
  

?>