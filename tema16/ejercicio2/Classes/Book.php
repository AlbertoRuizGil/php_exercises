<?php

  namespace Classes;

  class Book{
    public $author;
    public $title;
    public $isbn;

    public function __construct($aut,$tit,$is){
      $this->author=$aut;
      $this->title=$tit;
      $this->isbn=$is;
    }      

    public function __toString(){
      return "autor: " . $this->author . ",
       title: " . $this->title . ", 
       isbn: " . $this->isbn;
    }

  }

?>