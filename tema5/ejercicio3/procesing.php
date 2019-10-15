<?php
    require("functions.php");

    if(is_uploaded_file($_FILES["photo"]["tmp_name"])){

        $extension = explode("/",$_FILES["photo"]["type"]);
        

        if($extension[1] == "jpeg" || 
        $extension[1] == "jpg" || 
        $extension[1] == "gif"){

            $newfilename= uniqid();
            $route= "/archivos";

            $newfilename = $newfilename . "." . $extension[1];

            move_uploaded_file($_FILES["photo"]["tmp_name"], "./archivos/$newfilename");

            echo <<<EOD

                <p>$_POST[firstname]</p>
                <p>$_POST[surname]</p>
                <p>$_POST[street]</p>
                <p>$_POST[cp]</p>

                <img src="./archivos/$newfilename" alt="photo">

EOD;
            

        }else{
            $extension[1] = strtoupper($extension[1]);
            echo $extension[1] . " No es una extensión válida";
        }
        

    }else{
        echo "El archivo no fue enviado correctamente";
    }

?>