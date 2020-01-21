<?php

function loginForm()
{
    echo <<<EOD
    <h1>LOGIN FORM</h1>
    <form action="Controler/Login.php" method="POST">
        <input type="email" class="login-input" name="email" placeholder="email">
        <input type="password" class="login-input" name="pass" placeholder="password">
        <input type="submit" class="" value="login" name="submit">
    </form>
EOD;
}

function registerForm()
{
    echo <<<EOD
    <h1>REGISTER FORM</h1>
    <form action="../Controler/Login.php" method="POST">
        <input type="text" name="firstname" placeholder="firstname">
        <input type="text" name="surname" placeholder="surname">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="pass" placeholder="pass">
        <input type="password" name="repass" placeholder="repass">
        <input type="radio" name="subscription" value="basic">Basic
        <input type="radio" name="subscription" value="premium">Premium
        <input type="submit" class="" value="register" name="submit">
    </form>
EOD;
}
