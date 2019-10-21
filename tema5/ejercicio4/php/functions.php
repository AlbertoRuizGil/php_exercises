<?php


    function cleanstring($str){
    
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

    function isInBaseData($arr, $completename, $flag){ //El flag si es true devuelve el nombre del archivo, si es false devuelve si el nombre se encuentra en la base de datos
        for($i = 2; $i < count($arr); $i++){
            if($completename == takeonlyname($arr[$i])){
                if($flag == true){
                    return $arr[$i];
                }else{
                    return true;
                }
            }
        }
        return false;
    }

    function takeonlyname($dateandname){
        $parts = explode("_", $dateandname);
        $onlyname = explode(".", $parts[1]);
        return $onlyname[0];
    }


?>

