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
                <input type="text" name="user"></br>
                <label for="password">Password</label></br>
                <input type="text" name="password"></br>
                <input type="submit" name="login" value="login"></br>
              </form>
            </div>
          </div>
          <div class='mainbox-register'>
            <div class='mainbox-register-title'>
              <h2>Register</h2>
            </div>
            <div class='mainbox-register-form'>
              <form action="./Controler" method="post">
                <label for="user">User</label></br>
                <input type="text" name="user"></br>
                <label for="password">Password</label></br>
                <input type="text" name="password">
                <input type="submit" name="register" value="register"></br>
              </form>
            </div>
          </div>
      </div>

EOD;
  }

?>

