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

      <form action="readjson.php">
        <input type="submit" class="submit-btnread" name="submit" value="See DataBase">
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

  function takeNextCustomerID(){
    $datos = readJSON('./datacustomers.json');
    if($datos == null){
      $id = 1;
    }else{
      $long = count($datos);
      $id = $datos[$long - 1]["id"];
      $id++;
    }
    
    return $id;
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

  function readJSON($url){
    $str_datos = file_get_contents($url);
    $datos = json_decode($str_datos, true);
    return $datos;
  }

  function addCustomer($customer){
    $datos = readJSON('./datacustomers.json');
    $long = count($datos);

    $datos[$long]=array(
    "id"=>$customer->id,
    "name"=>$customer->name,
    "surname"=>$customer->surname,
    "email"=>$customer->email);

    $fh = fopen("datacustomers.json", 'w')
      or die("Error al abrir fichero de salida");
    fwrite($fh, json_encode($datos, JSON_UNESCAPED_UNICODE));
    fclose($fh);
  }

  function addBook($book){
    $datos = readJSON('./databooks.json');
    $long = count($datos);

    $datos[$long]=array(
    "author"=>$book->author,
    "title"=>$book->title,
    "isbn"=>$book->isbn);

    $fh = fopen("databooks.json", 'w')
      or die("Error al abrir fichero de salida");
    fwrite($fh, json_encode($datos, JSON_UNESCAPED_UNICODE));
    fclose($fh);
  }
?>



