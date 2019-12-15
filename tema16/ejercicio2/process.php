<?php
  require("./Functions/functions.php");
  require_once("./autoload.php");

  use Classes\{Book, Customer};

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

  if(!(completeCustomer()) && !(completeBook())){
    echo <<<EOD
    <div class='register-field'>
      <h1 class='register-field-title'>
        No se han rellenado los campos necesarios para registrar un cliente o un libro
      </h1>
    </div>
EOD;
  }
  if(completeCustomer()){
    echo "<div class='register-field'>";
    $id = takeNextCustomerID();
    $customer = new Customer($id, $_POST["name"],$_POST["surname"],$_POST["email"]);
    addCustomer($customer);
    echo "<h1 class='register-field-title'>Se ha registrado un cliente</h1>";
    paintTableCustomer($customer);
    echo "</div>";
  }

  if(completeBook()){
    echo "<div class='register-field'>";
    $book = new Book($_POST["author"],$_POST["title"],$_POST["isbn"]);
    addBook($book);
    echo "<h1 class='register-field-title'>Se ha registrado un libro</h1>";
    paintTableBook($book);
    echo "</div>";
  }


  header("Refresh:5; url=index.php");


?>
</div>

<div class="register-message">
  <h1 class="register-message-title">Será redirigido al inicio en 5 segundos</h1>
</div>
</body>
</html>

