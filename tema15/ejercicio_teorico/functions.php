<?php

  function paintForm(){
    echo <<<EOD
    <form action="" method="post">

      <input type="text" name="name" required>
      <input type="password" name="passwd" required>
      <input type="submit" value="Enviar" name="submit">

    </form>
EOD;
  }

  function checkUser($name, $password){
    require("users.php");
    if(array_key_exists($name, $users)){
      if($users[$name] == $password){
        
      }
    }
  }


?>


