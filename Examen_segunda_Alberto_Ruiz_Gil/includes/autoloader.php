<?php

  spl_autoload_register("myFunctionAutoload");

  function myFunctionAutoload($nombreClase) {
    /* $nombreClase = strtolower($nombreClase); */
    $directorio = __DIR__ . "\..\php\Model\\$nombreClase.php";
    if(file_exists($directorio)) {
        require_once($directorio);
    } else {
        die("No se ha podido encontrar el archivo {$nombreClase}.php .");
    }
  }

?>