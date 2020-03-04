<?php
  session_start();

  include "../../includes/autoloader.php";

  $db = DBConnect::getInstance("../../config/config.json");
  $cesta = $_SESSION["cesta"];
  $cesta = unserialize($cesta);
  $nueva_cesta = $cesta->eliminarProducto($_POST["producto"], $db);
  $nueva_cesta = serialize($nueva_cesta);
  $_SESSION["cesta"] = $nueva_cesta;
  header("Location: ../View/cesta.php");
?>