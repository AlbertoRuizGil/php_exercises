<?php
session_start();

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
      DBConnect::createdb("./config/config.json", "./sql/comercio.sql");
      header("Location: ./index.php");
  } else {
      $date = date('l jS \of F Y h:i:s A');
      $exArr = ["Message" => $ex->getMessage(), "File" => $ex->getFile(), "Line" => $ex->getLine(), "Code" => $ex->getCode(), "Date" => $date];
      $log = json_encode($exArr, true);
      error_log($log, 3, "logs/exception.log");
  }
}


$db = new DBConnect("./config/config.json");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <h1>INICIO DE LA APLICACIÓN</h1>

  <form action="./php/Controller/controller.php" method="post">
    <input type="submit" name="login" value="Pulse este enlace para login"><br><br>
    <input type="submit" name="productos" value="Pulse este enlace para ver productos">
  </form>
  
</body>
</html>



