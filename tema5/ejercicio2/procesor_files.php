<?php

    if(is_uploaded_file($_FILES["archivo"]["tmp_name"])){

        $extension = explode("/",$_FILES["archivo"]["type"]);
        

        if($extension[1] == "jpeg" || 
        $extension[1] == "jpg" || 
        $extension[1] == "gif"){

            $newfilename= uniqid();
            $route= "/archivos";
            
            echo $newfilename . "." . $extension[1];

            $newfilename = $newfilename . "." . $extension[1];

            move_uploaded_file($_FILES["archivo"]["tmp_name"], "./archivos/$newfilename");

            echo "Archivo subido correctamente";

        }else{
            $extension[1] = strtoupper($extension[1]);
            echo $extension[1] . " No es una extensión válida";
        }
        

    }else{
        echo "El archivo no fue enviado correctamente";
    }

?>