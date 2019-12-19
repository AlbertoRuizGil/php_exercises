<?php

  require("../Classes/Circle.php");
  require("../Classes/Triangle.php");
  require("../Classes/Square.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../View/style.css">
  <title>Document</title>
</head>
<body>

<?php

  if(isset($_POST["figure"])){

    $objects = array();
    for($i=0; $i<count($_POST["figure"]); $i++){
      $str = $_POST["figure"][$i];
      array_push($objects, new $str($_POST[$str . "-size"], $_POST[$str . "-color"]));
    }

    for($i=0; $i<count($objects); $i++){
      $source = $objects[$i]->paintFigure();
      echo "<div class='figure'><img src=" . $source . "></div>";
    }

    
  }else{
    echo "<h1 class=''>No has seleccionado ninguna figura</h1>";
  }

?>

<form action="../index.php" method="post">
  <input type="submit" value="Back">
</form>

</body>
</html>


