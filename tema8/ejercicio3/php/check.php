<?php

    function cleanstr($str){
        $str = trim($str);
        $str = strtolower($str);
        return $str;
    }

    function checkmonth($month){
        require("data.php");
        if((int)$month == 0){
            if(!isset($meses[$month])){
                return false;
            }
        }else{
            if((int)$month<=0 || (int)$month>12){
                return false;
            }
        }
        return true;
    }

    function checkyear($year){
        if((int)$year == 0){
            return false;
        }else if((int)$year<0){
            return false;
        }
        return true;
    }

    function checkdateown($month, $year){
        if(!checkmonth($month)){
            echo "Mes no válido";
            return false;
        }else if(!checkyear($year)){
            echo "Año no válido";
            return false;
        }
        return true;
    }
    

?>