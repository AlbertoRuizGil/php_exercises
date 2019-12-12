<?php
  require("functions.php");
  require_once __DIR__. '/Customer.php';
  require_once __DIR__. '/Book.php';
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
<div class="register">
<?php

  if(completeCustomer()){
    echo "<div class='register-field'>";
    $customer = registerCustomer();
    addCustomer($customer);
    echo "<h1 class='register-field-title'>Se ha registrado un cliente</h1>";
    paintTableCustomer($customer);
    echo "</div>";
  }

  if(completeBook()){
    echo "<div class='register-field'>";
    $book = registerBook();
    echo "<h1 class='register-field-title'>Se ha registrado un libro</h1>";
    paintTableBook($book);
    echo "</div>";
  }


  header("Refresh:5; url=index.php");


?>
</div>
</body>
</html>

