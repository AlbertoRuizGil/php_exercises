<?php

    

    function paintInit(){

        echo <<<EOD
        <form action="./php/processing.php" method="get">

            <input type="text" name="month">
            <input type="submit" value="Mostrar" name="submit">

        </form>
EOD;
    }


    function getNumberMonth($month){
        require("data.php");
        return $meses[$month];
    }

    function monthCalendar($numbermonth, $year){
        $date = new DateTime($year . "-" . $numbermonth . "-" . "01"); //dia 1 del mes
        
    }

    function paintCalendar($arrmonth){
        echo "<table>"
        for($i=0; $i<; $i++){
            echo "<tr>";
            for($j=0; $j<; $j++){
                echo "<td>" . $arrmonth . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    function createarrmonth($month){

        $arrmonth[0]= array("L","M","X","J","V","S","D");

        while()

    }

?>


