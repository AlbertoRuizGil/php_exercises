<?php

    function multiply_table($number) {

        echo <<<EOD
            <table>
                <tr>
                    <th>Operación</th>
                    <th>Resultado</th>
                </tr>
EOD;

        for($i = 1; $i < 11 ; $i++) {
            
            echo "<tr><td>" . $i . "x" . $number . "</td><td>" . ($i*$number) . "</td></tr>";
        }

        echo "</table>";
    }

?>