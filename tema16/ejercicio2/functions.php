<?php

  function paintForm(){
    echo <<<EOD
    <div class="form">
      <h1 class="form-title">Register Form</h1>
      <form method="post" action="process.php">
        <div class="form-book">
          <h3>Enter a book</h3>
          <label for="author">Author</label></br>
          <input type="text" name="author"></br>
          <label for="title">Title</label></br>
          <input type="text" name="title"></br>
          <label for="isbn">ISBN</label></br>
          <input type="text" name="isbn">
        </div>

        <div class="form-customer">
          <h3>Enter a customer</h3>
          <label for="name">Name</label></br>
          <input type="text" name="name"></br>
          <label for="surname">Surname</label></br>
          <input type="text" name="surname"></br>
          <label for="email">Email</label></br>
          <input type="text" name="email">
        </div>  

        <div class="submit">
          <input type="submit" class="submit-btn" value="Enviar" name="submit">
        </div>

      </form>
    </div>

EOD;
  }

  function completeBook(){
    if($_POST["author"]!="" &&
    $_POST["title"]!="" &&
    $_POST["isbn"]!=""
    ){
      return true;
    }else{
      return false;
    }
  }

  function completeCustomer(){
    if($_POST["name"]!="" &&
    $_POST["surname"]!="" &&
    $_POST["email"]!=""
    ){
      return true;
    }else{
      return false;
    }
  }

  function registerCustomer(){
    $customer = new Customer($_POST["name"],$_POST["surname"],$_POST["email"]);
    return $customer;
  }

  function registerBook(){
    $book = new Book($_POST["author"],$_POST["title"],$_POST["isbn"]);
    return $book;
  }

  function paintTableCustomer($customer){
    echo <<<EOD
    <div class='register-field-table'>
      <table>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Surname</td>
          <td>Email</td>
        </tr>
        <tr>
          <td>$customer->id</td>
          <td>$customer->name</td>
          <td>$customer->surname</td>
          <td>$customer->email</td>
        </tr>
      </table>
    </div>

EOD;
  }

  function paintTableBook($book){
    echo <<<EOD
    <div class='register-field-table'>
      <table>
        <tr>
          <td>Author</td>
          <td>Title</td>
          <td>ISBN</td>
        </tr>
        <tr>
          <td>$book->author</td>
          <td>$book->title</td>
          <td>$book->isbn</td>
        </tr>
      </table>
    </div>

EOD;
  }

  function addCustomer($customer){
    $str_datos = file_get_contents("datacustomers.json");
    $datos = json_decode($str_datos,true);
    echo "Estos son los datos: " . $datos;
    $long = count($datos[0]);

    $datos[0][$long]=array(
    "id"=>$customer->id,
    "name"=>$customer->name,
    "surname"=>$customer->surname,
    "email"=>$customer->email);

    $fh = fopen("datacustomers_out.json", 'w')
      or die("Error al abrir fichero de salida");
    fwrite($fh, json_encode($datos, JSON_UNESCAPED_UNICODE));
    fclose($fh);
  }

?>



