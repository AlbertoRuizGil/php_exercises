<?php
  session_start();

  include "../../includes/autoloader.php";

  $cesta = $_SESSION["cesta"];
  $cesta = unserialize($cesta);
  $producto = $_POST["producto"];
  $cantidad = $_POST["cantidad"];

  $db = DBConnect::getInstance("../../config/config.json");

  $cesta->insertarProducto($producto, $cantidad, $db);

  $cesta = serialize($cesta);
  $_SESSION["cesta"] = $cesta;

  header("Location: ../View/listar.php");
?>