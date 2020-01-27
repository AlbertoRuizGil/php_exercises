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

    public function getId($db){
      $conexion = $db->getConnection();

    }
    
    public function addSale($db){
      $conexion = $db->getConnection();
      $sql = "INSERT INTO sale (customer_id, saleDate) VALUES (?,?)";
      $statement = $conexion->prepare($sql);
      $statement = bindParam(1, $this->customer_id);
      $statement = bindParam(2, $this->saleDate);
      $statement->execute();
    }

  }
?>