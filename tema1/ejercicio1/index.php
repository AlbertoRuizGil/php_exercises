<?php

    $temp_max=4;
    
    $temperaturas=array();
    $temperaturas['Caja_1']=array(1,1,2,3,2,1,2,3,3,3,2,1,3,4);
    $temperaturas['Caja_2']=array(0,0,3,2,4,3,2,0,1,2,3,4,2,1);
    $temperaturas['Caja_3']=array(3,1,2,3,5,2,2,0,1,2,3,4,2,1);
    $temperaturas['Caja_4']=array(2,2,2,3,5,2,3,2,0,1,2,3,0,1);
    $temperaturas['Caja_5']=array(0,3,2,3,5,2,3,2,0,1,2,3,0,1);

    foreach( $temperaturas as $clave => $valor){
        for ($i=0; $i<count($valor) ; $i++){
            if($valor[$i] > $temp_max){
                echo "La " . $clave . "ha superado la temperatura máxima <br>";
                $i=count($valor);
            }
        }
    }

?>