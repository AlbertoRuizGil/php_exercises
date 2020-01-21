<?php

  function paintFormIndex(){
    echo <<<EOD
      <div class='Login-mainbox'>
      <h1 class='Login-mainbox-title'>Bienvenido a la aplicación de Librería</h1>
            <div class='Login-mainbox-login'>
              <form action="./Controler/Login.php" method="post">
                <label for="user" class="Login-main-login-label">Usuario</label></br>
                <input type="text" name="user" class="Login-main-login-input"></br>
                <label for="password" class="Login-main-login-label">Contraseña</label></br>
                <input type="password" name="password" class="Login-main-login-input"></br>
                <input type="submit" name="login" value="Login" class="Login-main-login-submit"></br>
              </form>
            </div>
          </div>
      </div>

EOD;
  }

?>