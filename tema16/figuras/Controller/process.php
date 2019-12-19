<?php

  require("../Classes/Circle.php");
  require("../Classes/Triangle.php");
  require("../Classes/Square.php");

  if(isset($_POST["figure"])){

    $objects = array();
    for($i=0; $i<count($_POST["figure"]); $i++){
      $str = $_POST["figure"][$i];
      array_push($objects, new $str($_POST[$str . "-size"], $_POST[$str . "-color"]));
    }

    $source = $objects[0]->paintFigure();

    echo "<img src=" . $source . ">";
  }

?>
