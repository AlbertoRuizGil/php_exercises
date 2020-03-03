<?php

  include "../includes/autoloader.php";

  $functions = spl_autoload_functions();

  var_dump($functions);

  $user = new User();
  $data = new Data();

  $user->createUser();
  $data->getData();

  diHola();

?>