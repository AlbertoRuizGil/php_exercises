<?php

function table($arr=[],$controllerPath){
    foreach ($arr as $rowkey => $row) {
        echo<<<EOD
         <tr>
         <td>
         <form method="post" action="$controllerPath">
            <input type="submit" value="delete" name="submit">
            <input type="hidden" value="$row[id]" name="id">
         </form>
         </td>
         <td>
         <form method="post" action="$controllerPath">
            <input type="submit" value="buy" name="submit">
            <input type="number" value="1" name="amount">
            <input type="hidden" value="$row[id]" name="id">
         </form>
         </td>
         <td>
         <form method="post" action="$controllerPath">
            <input type="submit" value="borrow" name="submit">
            <input type="hidden" value="$row[id]" name="id">
         </form>
         </td>
EOD;
       foreach ($row as $col => $colvalue) {
           echo "<td>$colvalue</td>";
       }
       echo "</tr>";
    }
    echo "</table>";
}