<?php

  function paintForm($isnameright="", $ispasswdright="", $placename, $placepasswd){
    echo <<<EOD
     <div class="login">
      <h1 class="login--maintittle">LOGIN</h1>
      <div class="form">
        <form class="login--form" method="post">
          Name
          <br/>
          <input type="text" name="name" class="$isnameright" placeholder="$placename" required>
          <br/>
          Password
          <br/>
          <input type="password" name="passwd" class="$ispasswdright" placeholder="$placepasswd" required>
          <br/>
          <input type="submit" value="Enviar" class ="sendbtn" name="submit">
          <br/>
        </form>
      </div>
    </div>
EOD;
  }

  function checkUser($name, $password){
    require("users.php");
    $name = trim($name);
    $password = trim($password);
    if(array_key_exists($name, $users)){
      if($users[$name] == $password){
        setcookie("user", $name, time()+15);
        header("Location: pageuser.php");
      }else{
        setcookie("ispasswdright", "wrong", time()+15);
        setcookie("placepasswd", "Contraseña incorrecta", time()+10);
        setcookie("isnameright", "wrong", time()-1);
        header("Location: index.php");
      }
    }else{
      echo "<<<<<<";
      setcookie("isnameright", "wrong", time()+15);
      setcookie("placename", "Usuario incorrecto", time()+10);
      setcookie("ispasswdright", "wrong", time()-1);
      header("Location: index.php");
    }
  }

?>


