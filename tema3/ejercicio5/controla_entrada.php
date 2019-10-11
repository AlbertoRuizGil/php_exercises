<?php

    function entry_control($input){

        if(preg_match("/^\s/", $input)){
            return false;
        }else{
            return true;
        }

    }


?>