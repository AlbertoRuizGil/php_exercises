<?php
require_once("../../php/commonFunctions.php");

function BookForm()
{
    insertBook();
    deleteBook();
}

function insertBook()
{
    echo<<<EOD
    <form action="../../Controler/Book.php" method="POST">
        <input type="text" class="login-input" name="isbn" placeholder="isbn">
        <input type="text" class="login-input" name="title" placeholder="title">
        <input type="text" class="login-input" name="author" placeholder="author">
        <input type="number" class="login-input" name="stock" placeholder="stock">
        <input type="number" step="0.01" class="login-input" name="price" placeholder="price">
        <input type="submit" class="" value="insert" name="submit">
    </form>
EOD;
}

function deleteBook()
{
    echo<<<EOD
    <form action="../../Controler/Book.php" method="POST">
        <input type="text" class="login-input" name="id" placeholder="id to delete">
        <input type="submit" class="" value="delete" name="submit">
    </form>
EOD;
}

function tableBook($arr)
{
    echo<<<EOD
     <table class="table">
     <tr>
        <th>DELETE</th>
        <th>BUY</th>
        <th>BORROW</th>
        <th>ID</th>
        <th>ISBN</th>
        <th>TITLE</th>
        <th>AUTHOR</th>
        <th>STOCK</th>
        <th>PRICE</th>
    </tr>
EOD;
    table($arr, "../../Controler/Book.php");
}
