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
  <title>Document</title>
</head>
<body>
<?php
  
  $cusright = completeCustomer();
  $bookright = completeBook();

  if(completeCustomer()){
    $customer = registerCustomer();
    
  }

  if(completeBook()){
    $book = registerBook();
    echo $book;
  }


  header("Refresh:5; url=index.php");


?>
</body>
</html>

