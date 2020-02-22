<?php

  $id = $_POST["id"];

  $doc = new DOMDocument; 
  $doc->load('../XML/books.xml');

  $thedocument = $doc->documentElement;

  $list = $thedocument->getElementsByTagName('Book');

  $nodeToRemove = null;
  foreach ($list as $domElement){
    $attrValue = $domElement->getAttribute('id');
    if ($attrValue == $id) {
      $nodeToRemove = $domElement;
    }
  }

  if ($nodeToRemove != null)
  $thedocument->removeChild($nodeToRemove);

  $doc->save("../XML/books.xml"); 
?>