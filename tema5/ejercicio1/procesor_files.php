<?php

    if(is_uploaded_file($_FILES["archivo"]["tmp_name"])){
        $date=getdate();
        $newfilename= uniqid();
        $route= "/archivos";

        $extension=explode("/",$_FILES["archivo"]["type"]);
      
        echo $newfilename . "." . $extension[1];
        $_FILES["archivo"]["name"]=$newfilename;


        $retorno=move_uploaded_file($_FILES["archivo"]["tmp_name"], "./archivos/");

        echo $retorno;

    }else{
        echo "El archivo no fue enviado correctamente";
    }

?>