<?php

  class Micabecera{
    
    private $header;

    public function __constructor($str){
      $this->header = $str;
    }

    public function __toString(){
      return $this->header;
    }
  }


?>