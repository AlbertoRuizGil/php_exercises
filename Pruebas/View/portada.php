<?php

  include "../includes/autoloader.php";

  $user = new User();
  $data = new Data();

  $user->createUser();
  $data->getData();


?>