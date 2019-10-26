<?php
    
    require_once("functions.php");
    require_once("check.php");

    $month = $_GET["month"];
    $year = $_GET["year"];

    $month = cleanstr($month);
    $year = cleanstr($year);

    if(checkdateown($month, $year)){

        if(is_numeric($month)){
            $isnumber = true;
        }else{
            $isnumber = false;
        }

        $date = getDateCalendar($month,$year,$isnumber);

        $dayweek = getDayWeek($date->format("N"));

        $arrmonth = createarrmonth($dayweek, $date->format("t"));

        paintCalendar($arrmonth);
    }else{
        echo "<br><a href='../index.php'>Volver</a>";
    }
    

?>