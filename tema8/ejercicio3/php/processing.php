<?php

    require("functions.php");

    $month = $_GET["month"];

    $numbermonth = getNumberMonth($month);

    echo monthCalendar($numbermonth, "2019");
?>