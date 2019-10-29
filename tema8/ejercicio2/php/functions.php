<?php

    function paintInit(){
        require("data.php");

        echo <<<EOD
        <div class='form'>
            <form action="" method="GET">
                <input type='text' name='year' placeholder='Introduzca el año'>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
EOD;
    }

    function processing(){
        require("check.php");
        require("data.php");

        if(isset($_GET["year"])){
            $year = $_GET["year"];

            if(checkyear($year)){

                foreach($meses as $mes=>$numero){
    
                    $date = getDateCalendar($numero,$year);
        
                    $dayweek = getDayWeek($date->format("N"));
        
                    $arrmonth = createarrmonth($dayweek, $date->format("t"));
        
                    paintCalendar($arrmonth, $mes);
                }
            }else{
                echo "<h1>'" . $year . "' No es un año válido</h1>";
            }
        }else{
            echo "<h1>Debes introducir un año</h1>";
        }
    }

    function getDayWeek($day){
        require("data.php");
        return $daysweeknumbers[$day];
    }

    function getDateCalendar($month, $year){
        $date = new DateTime($year . "-" . $month . "-" . "01"); //dia 1 del mes
        return $date;
    }

    function paintCalendar($arrmonth, $month){
        echo "<div class='mes'><h1>" . $month .  "</h1><table class='tablames'>";
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


