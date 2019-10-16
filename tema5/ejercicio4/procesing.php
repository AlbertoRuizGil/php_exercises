<?php

    require("functions.php");
    require("data.php");

    
    if(is_in_array($people, $_POST["firstname"])){

        if($_POST["surname"] == $people[$_POST["firstname"]][$APELLIDOS]){

            echo "Hasta aquí llegamos";

        }else{

            echo "Contraseña no válida";
        }
    }else{

        echo "Usuario no válido";
    }


?>