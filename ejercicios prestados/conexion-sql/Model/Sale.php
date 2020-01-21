<?php

class Sale
{
    private $customer_id;
    private $saleDate;

  
    public function __construct($customer_id, $saleDate)
    {
        $this->customer_id = $customer_id;
        $this->date = $date;
    }

    public function getcustomer_id()
    {
        return $this->customer_id;
    }

    public function getdate()
    {
        return $this->date;
    }

    public static function insertSale($DB, $customer_id, $saleDate)
    {
        $query = "INSERT INTO `Sale`(customer_id, saleDate) VALUES (?,?)";
        $pdo = $DB->getConnectionDB();
        $statement = $pdo->prepare($query);
        $statement->bindParam(1, $customer_id);
        $statement->bindParam(2, $saleDate);
        $statement->execute();
        return $pdo->lastInsertId();
    }

    public static function selectAllSale($DB)
    {
        $query = "SELECT * FROM Sale";
        $pdo = $DB->getConnectionDB();
        $statement = $pdo->prepare($query);
        $statement->execute();
        $arr = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $arr;
    }

    public static function deleteSale($DB,$id)
    {
        $query = "DELETE FROM Sale WHERE id=:id";
        $pdo = $DB->getConnectionDB();
        $statement = $pdo->prepare($query);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }
}
