<?php

    require("functions.php");
    
    require("data.php");

    $ficheros = scandir(DIRECTORY);

    $firstname = cleanstring($_POST["firstname"]);
    $surname = cleanstring($_POST["surname"]);

    $completename = $firstname . " " . $surname;


    if(isInBaseData($ficheros, $completename, false)){

        $imgname = isInBaseData($ficheros, $completename, true);
        echo "<img src='" . DIRECTORY. $imgname . "'>";

    }else{
        echo "El nombre introducido no se encuentra en la base de datos";
    }
?>

