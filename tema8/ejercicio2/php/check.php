<?php

    function checkyear($year){
        if((int)$year == 0){
            return false;
        }else if((int)$year<0){
            return false;
        }
        return true;
    }    

?>