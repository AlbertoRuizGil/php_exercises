<?php

    function is_in_array_key($array , $keycheck){

        foreach($array as $key => $value){
            if($key == $keycheck){
                return true;
            }
        }
        return false;
    }

?>