<?php
  session_start();

  include "../../includes/autoloader.php";

  $db = DBConnect::getInstance("../../config/config.json");

  $cesta = $_SESSION["cesta"];
  $cesta = unserialize($cesta);
  $arrProductos = $cesta->getProductos();

  for($i=0; $i<count($arrProductos); $i++){
    Compra::insertarCompra($db, $_SESSION["cod_usuario"], $arrProductos[$i]["producto"], $arrProductos[$i]["cantidad"]);
  }

  $fecha = date("d/m/Y");

  $str = "<factura>";
  $str = $str . "<fecha>" . $fecha . "</fecha>";
  $str = $str . "<cliente>" . $_SESSION["usuario"] . "</cliente>";
  $str = $str . "<email>" . $_SESSION["email"] . "</email>";
  if(isset($_SESSION["direccion"])){
    $str = $str . "<direccion>" . $_SESSION["direccion"] . "</direccion>";
  }
  $str = $str . "<productos>";
  for($i=0; $i<count($arrProductos); $i++){
    $str = $str . "<producto>";
    $str = $str . "<nombre>" . $arrProductos[$i]["nombre"] . "</nombre>";
    $str = $str . "<cantidad>" . $arrProductos[$i]["cantidad"] . "</cantidad>";
    $str = $str . "<precio>" . $arrProductos[$i]["precio"] . "</precio>";
    $subtotal = $arrProductos[$i]["cantidad"] * $arrProductos[$i]["precio"];
    $str = $str . "<total>" . $subtotal . "</total>";
    $str = $str . "</producto>";
  }
  $str = $str . "<total>" . $cesta->precioTotal() . "</total>";
  $str = $str . "</productos>";
  $str = $str . "</factura>";

  $xml = new SimpleXMLElement($str);
  $xml->asXML("../../xml/factura.xml");
  
  echo "Gracias por comprar en nuestra aplicación";

  unset($_SESSION["cesta"]);

  header("Refresh:5; url=../View/listar.php");



?>