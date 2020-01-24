<?php

  class Sales{
    private $book_id;
    private $sale_id;
    private $amount;

    public function __construct($book_id, $sale_id, $amount){
      $this->book_id = $book_id;
      $this->sale_id = $sale_id;
      $this->amount = $amount;
    }

    public function getBook_id(){
      return $this->book_id;
    }

    public function getSale_id(){
      return $this->sale_id;
    }

    public function getAmount(){
      return $this->amount;
    }
    

  }
?>