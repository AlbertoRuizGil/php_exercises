<?php

    
    require("functions.php");

    $month = $_GET["month"];
    $year = $_GET["year"];

    $date = getDateCalendar($month,$year);

    $dayweek = getDayWeek($date->format("N"));

    $arrmonth = createarrmonth($dayweek, $date->format("t"));

    paintCalendar($arrmonth);

?>