<?php

  function checkUser(){

    $db = new DBConnect("../Config/config.json");
    $sql = "SELECT user,pass FROM customer";
    return $db->throwquery($sql);
  }
  

?>