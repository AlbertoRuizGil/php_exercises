<?php

    function gettoday(){
        return date("d/m/y H:i:s") . "\n";
    }

    function getnextday(){
        $date = new Datetime;
        $nextdate = $date->add(new DateInterval ('P1D'));
        return $nextdate->format("D, d M y H:i:s O");
    }

    function getnextmonday(){
        $date
    }

?>