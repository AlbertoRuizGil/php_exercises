<?php

class Book
{
    private $isbn;
    private $title;
    private $author;
    private $stock;
    private $price;

    public function __construct($isbn, $title, $author, $stock, $price)
    {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->stock = $stock;
        $this->price = $price;
    }

    public function getIsbn()
    {
        return $this->isbn;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function insertBook($DB)
    {
        $query = "INSERT INTO `Book`(isbn, title, author, stock, price) VALUES (?,?,?,?,?)";
        $pdo = $DB->getConnectionDB();
        $statement = $pdo->prepare($query);
        $statement->bindParam(1, $this->isbn);
        $statement->bindParam(2, $this->title);
        $statement->bindParam(3, $this->author);
        $statement->bindParam(4, $this->stock);
        $statement->bindParam(5, $this->price);
        $statement->execute();
    }

    public static function selectAllBook($DB)
    {
        $query = "SELECT * FROM Book";
        $pdo = $DB->getConnectionDB();
        $statement = $pdo->prepare($query);
        $statement->execute();
        $arr = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $arr;
    }

    public static function deleteBook($DB,$id)
    {
        $query = "DELETE FROM Book WHERE id=:id";
        $pdo = $DB->getConnectionDB();
        $statement = $pdo->prepare($query);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public static function saleBook($DB,$id, $amount)
    {
        $query = "UPDATE Book
        SET stock = stock - :amount
        WHERE id=:id";
        $pdo = $DB->getConnectionDB();
        $statement = $pdo->prepare($query);
        $statement->bindParam(":id", $id);
        $statement->bindParam(":amount", $amount);
        $statement->execute();
    }


}
