<?php

    require("data.php");
    require("functions.php");


    if(is_in_array_key($users, $_POST["identifier"])) {

        if($_POST["passwd"] == $users[$_POST["identifier"]]){

            echo "Bienvenid@ ";

        }

        else{

            echo "La contraseña no es válida";
        }

    }else{

        echo "El usuario no es válido";
    }

?>