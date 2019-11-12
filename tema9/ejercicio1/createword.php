<?php

        $all_letters = "1234567890abcdefghijklmnopqrstuvwxyz";
        $arr = str_split($all_letters);
        $word = "";
        $randnumber = 0;
        for($i=0 ; $i<6; $i++){
            $randnumber = rand(0, count($arr)-1);
            $word = $word . $arr[$randnumber];
        }
?>