<?php

  class Book{
    private $isbn;
    private $title;
    private $author;
    private $stock;
    private $price;

    public function __construct($isbn, $title, $author, $stock, $price){
      $this->isbn = $isbn;
      $this->title = $title;
      $this->author = $author;
      $this->stock = $stock;
      $this->price = $price;
    }

    public function getIsbn(){
      return $this->isbn;
    }

    public function getTitle(){
      return $this->title;
    }

    public function getAuthor(){
      return $this->author;
    }

    public function getStock(){
      return $this->stock;
    }

    public function getPrice(){
      return $this->price;
    }

    public static function setStock($db, $id, $amount){
      $conexion = $db->getConnection();
      $sql = "SELECT stock FROM book WHERE id= :book_id";
      $statement = $conexion->prepare($sql);
      $statement->bindValue(":book_id", $id);
      $statement->execute();
      $arr = $statement->fetch(PDO::FETCH_ASSOC);
      
      if($amount <= $arr["stock"]){
        $diference = $arr["stock"] - $amount;
        $sql_update = "UPDATE book SET stock= :amount WHERE id= :book_id";
        $statement_update = $conexion->prepare($sql_update);
        $statement_update->bindValue(":amount", $diference);
        $statement_update->bindValue(":book_id", $id);
        $statement_update->execute();
        return true;
      }
      return false;
    }

    public function addBook($db){

      if(!$this->checkBook($db)){
        $conexion = $db->getConnection();
        $sql = "INSERT INTO book (isbn, title, author, stock, price) VALUES (?,?,?,?,?);";
        $statement = $conexion->prepare($sql);
        $statement->bindParam(1, $this->isbn);
        $statement->bindParam(2, $this->title);
        $statement->bindParam(3, $this->author);
        $statement->bindParam(4, $this->stock);
        $statement->bindParam(5, $this->price);
        $statement->execute();
      }
      
    }

    public function checkBook($db){
      $conexion = $db->getConnection();
      $sql =  "SELECT * FROM book WHERE title=:title";
      $statement = $conexion->prepare($sql);
      $statement->bindValue(":title", $this->title);
      $statement->execute();

      $rows = $statement->rowCount();

      if($rows !=0){
        return true;
      }
      return false;
    }

    public static function modifyBook($db, $id, $field, $newvalue){
      $conexion = $db->getConnection();
      if($field == "stock" || $field == "price"){
        $sql = "UPDATE book SET {$field}={$newvalue} WHERE id=:id";
      }else{
        $sql = "UPDATE book SET {$field}='{$newvalue}' WHERE id=:id";
      }

      echo $sql;
      
      $statement = $conexion->prepare($sql);
      $statement->bindValue(":id", $id);
      $statement->execute();
    }

    public static function deleteBook($db, $id){
      $conexion = $db->getConnection();
      $sql =  "DELETE FROM book WHERE id=:id";
      $statement = $conexion->prepare($sql);
      $statement->bindValue(":id", $id);
      $statement->execute();
    }

    public static function getAllBooks($db){
      $conexion = $db->getConnection();
      $sql = "SELECT * FROM book";
      $statement = $conexion->prepare($sql);
      $statement->execute();
      $arr = $statement->fetchAll();
      return $arr;
    }

    public static function getOneBook($db, $id){
      $conexion = $db->getConnection();
      $sql =  "SELECT * FROM book WHERE id=:id";
      $statement = $conexion->prepare($sql);
      $statement->bindValue(":id", $id);
      $statement->execute();
      $arr = $statement->fetchAll();
      return $arr;
    }

    public static function paintAllBooks($arr, $type){
      echo <<<EOD
      <table>
        <tr class="Book-table-row Book-table-row-main">
          <td >ISBN</td>
          <td>TÍTULO</td>
          <td>AUTOR</td>
          <td>STOCK</td>
          <td>PRECIO (€)</td>
EOD;
        if($type=="books"){
          echo "<td>BORRAR</td><td>MODIFICAR</td>";
        }else if($type=="buy"){
          echo "<td>ADQUIRIR</td>";
        }else if($type=="rent"){
          echo "<td>ALQUILAR</td>";
        }
        echo "</tr>";

      for($i=0; $i<count($arr); $i++){
        if($i%2==0){
          echo "<tr class='Book-table-row Book-table-row-even'>";
        }else{
          echo "<tr class='Book-table-row Book-table-row-odd'>";
        }
        
        for($j=1; $j<6; $j++){
          echo "<td>" . $arr[$i][$j] . "</td>";
        }
        if($type=="books"){
          echo <<<EOD
          <td> 
            <form action="../Controler/Book.php" method="post">
              <input type="submit" class="Book-table-submit" value="ELIMINAR" name="delete">
              <input type="hidden" value="{$arr[$i][0]}" name="id">
            </form>
          </td>
          <td> 
            <form action="../View/ModifyBook.php" method="post">
              <input type="submit" class="Book-table-submit" value="MODIFICAR" name="modify">
              <input type="hidden" value="{$arr[$i][0]}" name="id">
            </form>
          </td>
EOD;
        }else if($type=="buy"){
          echo <<<EOD
          <td> 
            <form action="../Controler/Sale.php" method="post">
              <input type="number" name="amount" min="1" value="1">
EOD;
          if($arr[$i]["stock"]!=0){
            echo "<input type='submit' class='Book-table-submit' value='COMPRAR' name='rent'>";
          }else{
            echo "<input type='submit' class='Book-table-submit Book-table-submit-disabled' value='COMPRAR' name='rent' disabled>";
          }
              
          echo <<<EOD
              <input type="hidden" value="{$arr[$i][0]}" name="id">
            </form>
          </td>
EOD;
        }else if($type=="rent"){
          echo <<<EOD
          <td> 
            <form action="../Controler/Borrowed_books.php" method="post">
EOD;
          if($arr[$i]["stock"]!=0){
            echo "<input type='submit' class='Book-table-submit' value='ALQUILAR' name='rent'>";
          }else{
            echo "<input type='submit' class='Book-table-submit Book-table-submit-disabled' value='ALQUILAR' name='rent' disabled>";
          }
              
          echo <<<EOD
              <input type="hidden" value="{$arr[$i][0]}" name="id">
            </form>
          </td>
EOD;
        }
        
        echo "</tr>";
      }
      echo "</table>";
    }

    public static function paintOneBook($arr){
      echo <<<EOD
      <form action="../Controler/ModifyBook.php" method="post">
        <input type="hidden" value="{$arr[0][0]}" name="id">
        <table class="Book-table">
          <tr class="Book-table-row Book-table-row-main">
            <td>CONCEPTO</td>
            <td>VALOR ACTUAL</td>
            <td>NUEVO VALOR</td>
          </tr>
          <tr>
            <td>ISBN</td>
            <td>{$arr[0][1]}</td>
            <td><input type="text" name="isbn"></td>
          </tr>
          <tr>
            <td>TÍTULO</td>
            <td>{$arr[0][2]}</td>
            <td><input type="text" name="title"></td>
          </tr>
          <tr>
            <td>AUTOR</td>
            <td>{$arr[0][3]}</td>
            <td><input type="text" name="author"></td>
          </tr>
          <tr>
            <td>STOCK</td>
            <td>{$arr[0][4]}</td>
            <td><input type="number" name="stock"></td>
          </tr>
          <tr>
            <td>PRECIO (€)</td>
            <td>{$arr[0][5]}</td>
            <td><input type="number" name="price"></td>
          </tr>
          <tr>
            <td colspan="3"><input type="submit" name="submit" value="MODIFICAR" class="Book-table-submit"></td>
          </tr>
        </table>
      </form>
EOD;
    }
  }
?>