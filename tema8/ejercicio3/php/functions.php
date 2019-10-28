<?php

    function paintInit(){

        echo <<<EOD
        <div class='form'>
            <form action="" method="get">

                <input type="text" name="month" placeholder="Escribe el mes en minúsculas">
                <input type="text" name="year" placeholder="Escribe el año">
                <input type="submit" value="Mostrar" name="submit">

            </form>
        </div>
EOD;
    }

    function processing(){
        $month = $_GET["month"];
        $year = $_GET["year"];

        $date = getDateCalendar($month,$year);

        $dayweek = getDayWeek($date->format("N"));

        $arrmonth = createarrmonth($dayweek, $date->format("t"));

        paintCalendar($arrmonth);
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

    function paintCalendar($arrmonth){
        echo "<div class='mes'><table>";
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

    function getDayWeek($day){
        require("data.php");
        return $daysweeknumbers[$day];
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


