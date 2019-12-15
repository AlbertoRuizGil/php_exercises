<?php
  require("./Functions/functions.php");
?>

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

<div class="database">
<?php

  $customers = readJSON('./DataBase/datacustomers.json');
  $books = readJSON('./DataBase/databooks.json');

  paintDataBase($customers, $books);

?>
  <form action="index.php" method="post">
    <input type="submit" value="Back to index" class="database-btn" name="submit">
  </form>
</div>
  
</body>
</html>