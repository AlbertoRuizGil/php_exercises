<?php
  session_start();
  require("data.php");
  require("functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <?php
    if(!isset($_SESSION["word"])){
      $_SESSION["word"]=randomWord();
      $_SESSION["pushedkeys"] = array();
      $_SESSION["fails"]=0;
    }

    
    if(checkOver()){
      echo "<h1 class='lose-title'> YOU WIN </h1>";
    }else if($_SESSION["fails"]>=$MAXFAILS){
      echo "<h1 class='lose-title'> YOU LOSE </h1>";
    }else{
      paintFront();
    }

  ?>

  <div class="exit">
    <form action="exit.php" method="post">
      <input type="submit" name="exit" value="Salir" class="exit-btn">
    </form>
  </div>
  
</body>
</html>