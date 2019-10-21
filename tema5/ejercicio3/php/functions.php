<?php

    function cleanstring($str){
        
        //require("data.php");
        
        //Elimina caracteres problemáticos
        $problematicchar = array("<",">");
        $str = str_replace($problematicchar, "", $str);
        //Elimina espacios en blanco finales e iniciales
        $str = trim($str);
        //Elimina caracteres con acento
        //$str = strtr( $str, $unwanted_array);
        //Convierte a minúsculas
        //$str = strtolower($str);
        //Convierte muchos espacios en blanco en uno solo
        $str = preg_replace("/[\s]+/", " ",$str);

        return $str;
    }

    function getextension($filename){
        
        $arrfilename = explode("/", $filename);
        return $arrfilename[1];
    }

    function isformatvalid($extension){

        if( $extension == "jpeg" || 
        $extension == "jpg" || 
        $extension == "gif"){
            return true;
        }else{
            return false;
        }
    }

    function createnewfilename($firstname, $surname, $extension){
        $arrDate = getdate();
        $date = $arrDate["mday"] . "-" . $arrDate["mon"] . "-" . $arrDate["year"];
        return $date . "_" . $firstname . " " . $surname . "." . $extension;
    }

    function createroute($newfilename){
        return "../archivos/" . $newfilename;
    }

?>