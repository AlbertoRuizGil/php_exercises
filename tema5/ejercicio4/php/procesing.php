<?php

    require("functions.php");
    
    require("data.php");

    $ficheros = scandir(DIRECTORY);

    $firstname = cleanstring($_POST["firstname"]);
    $surname = cleanstring($_POST["surname"]);

    $completename = $firstname . " " . $surname;

    isInBaseData($ficheros, $completename);

    /*if(isInBaseData($ficheros, $completename)){

        echo "El usuario está en la base de datos";

    }else{
        echo "El nombre introducido no se encuentra en la base de datos";
    }*/
?>