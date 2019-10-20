<?php


    function cleanstring($str){
    
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

    function isInBaseData($arr, $completename){
        for($i = 0; $i < count($arr); $i++){
            /*if($completename == takeonlyname($arr[$i])){
                return true;
            }*/
            echo takeonlyname($arr[$i]);
        }
        //return false;
    }

    function takeonlyname($dateandname){
        $parts = explode("_", $dateandname);
        $onlyname = explode(".", $parts[1]);
        return $onlyname[0];
    }


?>

