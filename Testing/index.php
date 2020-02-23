<?php

  $viviendas_doc = new DOMDocument; 
  $viviendas_doc->load('./viviendas.xml');

  $viviendas = $viviendas_doc->documentElement;
  $list = $viviendas->getElementsByTagName('vivienda');

  foreach($list as $vivienda){
    /* $vivienda->getElementsByTagName("tipo")->item(0)->textContent = "Adosado"; */
    if($vivienda->getElementsByTagName("extras")->item(0)->getElementsByTagName("jardin")->item(0)->textContent == "si"){
      var_dump($vivienda);
    }
    /* echo $vivienda->getElementsByTagName("extras")->item(0)->getElementsByTagName("jardin")->item(0)->textContent . " "; */
  }

  /* $viviendas_doc->save("./viviendas.xml"); */

  
  //Pruebas con SimpleXMLElement
  /* $viviendas = new SimpleXMLElement("./viviendas.xml",null ,true);
  echo count($viviendas); */
?>