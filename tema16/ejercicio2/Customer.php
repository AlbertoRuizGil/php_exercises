<?php

  class Customer {
    public $id;
    public $name;
    public $surname;
    public $email;

    public function __construct($id, $name, $surname, $email){
      $this->id = $id;
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