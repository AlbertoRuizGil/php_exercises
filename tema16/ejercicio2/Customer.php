<?php

  class Customer {
    public $id;
    public $name;
    public $surname;
    public $email;
    private static $lastid=0;

    public function __construct($name, $surname, $email){
      $this->id = ++self::$lastid;
      $this->name = $name;
      $this->surname = $surname;
      $this->email = $email;
    }

    public function __toString():string{
      return "id: " . $this->id . ",
      name: " . $this->name . ",
      surname: " . $this->surname . ",
      email: " . $this->email;
    } 
  }

?>