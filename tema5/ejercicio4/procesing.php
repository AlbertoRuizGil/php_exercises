<?php

    require("functions.php");
    
    require("data.php");

    
    if(is_in_array($people, $_POST["firstname"])){

        if($_POST["surname"] == $people[$_POST["firstname"]][SURNAME]){

            echo <<<EOD
            <p>Nombre</p>
            <p>$_POST[firstname]</p>
            <p>Apellidos</p>
            <p>{$people[$_POST['firstname']][SURNAME]}</p>
            <p>Dirección</p>
            <p>{$people[$_POST['firstname']][STREET]}</p>
            <p>Código postal</p>
            <p>{$people[$_POST['firstname']][CP]}</p>
            <img src="{$people[$_POST['firstname']][IMAGES]}" alt="photo">
            
EOD;
            
            
        }else{

            echo "Apellido no válido";
        }
    }else{

        echo "Usuario no válido";
    }


?>