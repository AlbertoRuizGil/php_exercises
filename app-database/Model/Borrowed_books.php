<?php

  class Borrowed_books{
    private $customer_id;
    private $book_id;
    private $borrowStart;
    private $borrowEnd;

    public function __construct($customer_id, $book_id, $borrowStart, $borrowEnd){
      $this->customer_id = $customer_id;
      $this->book_id = $book_id;
      $this->borrowStart = $borrowStart;
      $this->borrowEnd = $borrowEnd;
    }

    public function getCustomer_id(){
      return $this->customer_id;
    }

    public function getBook_id(){
      return $this->book_id;
    }

    public function getBorrowStart(){
      return $this->borrowStart;
    }

    public function getBorrowEnd(){
      return $this->borrowEnd;
    }

    public function setBorrowEnd($db, $customer_id, $book_id, $newValue){
      $conexion = $db->getConnection();
      $sql = "UPDATE book SET borrowEnd={$newvalue} WHERE customer_id= :customer AND book_id= :book";
      $statement = $conexion->prepare($sql);
      $statement->bindValue(":customer", $customer_id);
      $statement->bindValue("book", $book_id);
      $statement->execute();
    }

    public function addBorrowed_books($db){
      $conexion = $db->getConnection();
      $sql = "INSERT INTO borrowed_books (customer_id, book_id, borrowStart, borrowEnd) VALUES (?,?,?,?)";
      $statement = $conexion->prepare($sql);
      $statement->bindParam(1, $this->customer_id);
      $statement->bindParam(2, $this->book_id);
      $statement->bindParam(3, $this->borrowStart);
      $statement->bindParam(4, $this->borrowEnd);
      $statement->execute();
    }

    public static function getAllBorrowed_books($db, $customer_id){
      $conexion = $db->getConnection();
      $sql = "SELECT title, borrowStart FROM book, borrowed_books WHERE id = book_id AND customer_id= :cus_id";
      $statement = $conexion->prepare($sql);
      $statement->bindValue(":cus_id", $customer_id);
      $statement->execute();
      $arr = $statement->fetchAll();
      return $arr;
    }

    public static function paintBorrowed_books($arr){
      echo <<<EOD
      <table>
        <tr class="Book-table-row Book-table-row-main">
          <td>TÍTULO</td>
          <td>FECHA DE ALQUILER</td>
          <td>DEVOLUCIÓN</td>
        </tr>
EOD;
      for($i=0; $i<count($arr); $i++){
        if($i%2==0){
          echo "<tr class='Book-table-row Book-table-row-even'>";
        }else{
          echo "<tr class='Book-table-row Book-table-row-odd'>";
        }
        echo "<td> {$arr[$i]['title']}</td> <td> {$arr[$i]['borrowStart']}</td>"; 
        echo "<td>
        <form method='post' action='../Controler/Rents.php'>
          <input type='submit' class='Book-table-submit' value='DEVOLVER' name='return'>
        </form>
        </td>";
        echo "</tr>";
      }
      echo "</table>";
    }
  }

?>