<?php
require_once("../../php/commonFunctions.php");

function BorrowedForm()
{
    viewAllBorrowed();
}


function viewAllBorrowed()
{
    echo<<<EOD
    <form action="../../Controler/Borrowed_books.php" method="POST">
        <input type="submit" class="" value="view" name="submit">
    </form>
EOD;
}

function tableBorrowed($arr)
{
    echo<<<EOD
    <table>
    <tr>
    <th>RETURN</th>
    <th>CUSTOMER_ID</th>
    <th>BOOK_ID</th>
    <th>BORROW_START</th>
    <th>BORROW_END</th>
    </tr>

EOD;
    foreach ($arr as $rowkey => $row) {
        echo<<<EOD
        <td>
        <form method="post" action="../../Controler/Borrowed_books.php">
           <input type="submit" value="return" name="submit">
           <input type="hidden" value="$row[customer_id]" name="customer_id">
           <input type="hidden" value="$row[book_id]" name="book_id">
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
