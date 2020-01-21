<?php

  function paintFormIndex(){
    echo <<<EOD
      <div class='mainbox'>
      <h1 class='mainbox-title'>Bienvenido a la aplicación de Librería</h1>
          <div class='mainbox-login'>
            <div class='mainbox-login-title'>
              <h2>Login</h2>
            </div>
            <div class='mainbox-login-form'>
              <form action="./Controler/Login.php" method="post">
                <label for="user">User</label></br>
                <input type="text" name="user" class="main-login-input"></br>
                <label for="password">Password</label></br>
                <input type="text" name="password" class="main-login-input"></br>
                <input type="submit" name="login" value="Login" class="main-login-submit"></br>
              </form>
            </div>
          </div>
      </div>

EOD;
  }

?>
