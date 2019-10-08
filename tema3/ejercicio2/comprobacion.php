<?php

    include("data.php");

    if(in_array(($_POST["identifier"]) , $users)) {

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