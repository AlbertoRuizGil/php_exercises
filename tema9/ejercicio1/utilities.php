<?php


    require("createword.php");
    $passwd = $_POST["passwd"];

    if($passwd != $word){
        header ('Refresh: 5; url=index.php');
        echo "Captcha incorrecto, será redirigido en 5 segundos";
    }else{
        echo "Captcha correcto";
    }

?>