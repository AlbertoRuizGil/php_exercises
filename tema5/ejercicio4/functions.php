<?php


    function is_in_array($people, $keycheck){

        foreach($people as $key => $value){
            if($key == $keycheck){
                return true;
            }
        }
        return false;
    }

?>

