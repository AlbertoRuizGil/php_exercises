<?php

    if(is_uploaded_file($_FILES["archivo"]["tmp_name"])){

        $newfilename= uniqid();
        $route= "/archivos";

        $extension=explode("/",$_FILES["archivo"]["type"]);
      
        echo $newfilename . "." . $extension[1];

        $newfilename = $newfilename . "." . $extension[1];

        $retorno=move_uploaded_file($_FILES["archivo"]["tmp_name"], "./archivos/$newfilename");

        echo " " . $retorno;

    }else{
        echo "El archivo no fue enviado correctamente";
    }

?>