<?php

    function getdatenew($modifier="+0 day", $formatize="d/m/y H:i:s"){
        $date = new DateTime;
        $date->modify($modifier);
        return $date->format($formatize);
    }


?>