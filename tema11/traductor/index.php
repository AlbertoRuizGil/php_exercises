<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <?php
    require("./functions.php");
    if(isset($_POST["language"]) && 
      isset($_POST["font"]) && 
      isset($_POST["background"])){
        paintForm($_POST["language"], $_POST["font"], $_POST["background"]);
    } else if(isset($_COOKIE["language"]) && 
      isset($_COOKIE["font"]) && 
      isset($_COOKIE["background"])){
        paintForm($_COOKIE["language"], $_COOKIE["font"], $_COOKIE["background"]);
    }else{
      paintForm();
    }
  ?>
</body>
</html>





