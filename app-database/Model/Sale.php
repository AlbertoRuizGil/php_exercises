<?php

  class Sale{
    private $customer_id;
    private $saleDate;

    public function __construct($customer_id, $saleDate){
      $this->customer_id = $customer_id;
      $this->saleDate = $saleDate;
    }

    public function getCustomer_id(){
      return $this->customer_id;
    }
    
    public function getSaleDate(){
      return $this->saleDate;
    }

    public function getLastId($db, $customer_id, $saleDate){
      $conexion = $db->getConnection();
      $sql = "SELECT id FROM sale WHERE customer_id= :cus_id AND saleDate= :sal_Dat";
      $statement = $conexion->prepare($sql);
      $statement->bindValue(":cus_id", $customer_id);
      $statement->bindValue(":sal_Dat", $saleDate);
      $statement->execute();
      $arr = $statement->fetch(PDO::FETCH_ASSOC);

      return $arr["id"];
    }
    
    public function addSale($db){
      $conexion = $db->getConnection();
      $sql = "INSERT INTO sale (customer_id, saleDate) VALUES (?,?)";
      $statement = $conexion->prepare($sql);
      $statement->bindParam(1, $this->customer_id);
      $statement->bindParam(2, $this->saleDate);
      $statement->execute();
    }

    public function __toString(){
      return "Customer_id: " . $this->customer_id . "/ SaleDate: " . $this->saleDate;
    }

  }
?>