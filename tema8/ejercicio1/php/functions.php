<?php

    function getdatenew($modifier="+0 day", $formatize="d/m/y H:i:s"){
        $date = new Datetime;
        $date->modify($modifier);
        return $date->format($formatize);
    }


?>