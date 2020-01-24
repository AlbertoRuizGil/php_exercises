<?php

  class Borrow{
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
  }

?>