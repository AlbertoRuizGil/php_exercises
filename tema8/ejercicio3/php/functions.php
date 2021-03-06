<?php

    function paintInit(){
        require("data.php");

        echo <<<EOD
        <form action="" method="GET">
            <select name="month">
            <option selected="selected" disabled>mes</option>
EOD;
        foreach($meses as $mes=>$numero){
            echo "<option value='$mes'>$mes</option>";
        }
        echo "</select>";
        echo <<<EOD
            <input type='text' name='year'>
            
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
EOD;
    }

    function processing(){
        require("check.php");

        if(isset($_GET["month"])){
            $month = $_GET["month"];
            $year = $_GET["year"];

            if(checkyear($year)){
            
                $date = getDateCalendar($month,$year);

                $dayweek = getDayWeek($date->format("N"));

                $arrmonth = createarrmonth($dayweek, $date->format("t"));

                paintCalendar($arrmonth, $month);
            }else{
                echo "<h1>'" . $year . "' No es un año válido</h1>";
            }
        }else{
            echo "<h1>Debes seleccionar un mes</h1>";
        }
    }

    function getDayWeek($day){
        require("data.php");
        return $daysweeknumbers[$day];
    }


    function getNumberMonth($month){
        require("data.php");
        return $meses[$month];
    }

    function getDateCalendar($month, $year){
        $numbermonth = getNumberMonth($month);
        $date = new DateTime($year . "-" . $numbermonth . "-" . "01"); //dia 1 del mes
        return $date;
    }

    function paintCalendar($arrmonth, $month){
        echo "<div class='mes'><h1>" . $month .  "</h1><table>";
        for($i=0; $i<count($arrmonth); $i++){
            echo "<tr>";
            for($j=0; $j<7; $j++){
                if($arrmonth[$i][$j]!=0 || is_string($arrmonth[$i][$j])){
                    if(($j==5 || $j==6) && $i!=0){
                        echo "<td class='finde'>" . $arrmonth[$i][$j] . "</td>"; //si es fin de semana
                    }else if($i==0){
                        echo "<th>" . $arrmonth[$i][$j] . "</th>";
                    }else{
                        echo "<td>" . $arrmonth[$i][$j] . "</td>";
                    }
                }else{
                    echo "<td></td>";
                }
            }
            echo "</tr>";
        }
        echo "</table></div>";

    }

    function createarrmonth($dayweek, $daysofmonth){

        $arrmonth[0]= array("L","M","X","J","V","S","D"); //Inicio del calendario
        $j=0;
        
        while($arrmonth[0][$j]!=$dayweek){//inicio en blanco
            $arrmonth[1][$j]=0;
            $j++;
        }
       
        $count=1;
        $i=1;
        while($count<=$daysofmonth){//body del calendario
            while($j<7 && $count<=$daysofmonth){
                $arrmonth[$i][$j]=$count;
                $count++;
                $j++;
            }
            if($count<=$daysofmonth){
                $j=0;
                $i++;
            }
            
        }
        if($j<7){//final en blanco
            while($j<7){
                $arrmonth[$i][$j]=0;
                $j++;
            }
        }
        return $arrmonth;
    }

?>


