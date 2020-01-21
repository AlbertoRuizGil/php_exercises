<?php
session_start();
require_once("bookFunctions.php");
require_once("../../Model/Book.php");
require_once("../../Model/ConnectDB.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../CSS/style.css">
</head>

<body>
    <?php
    $DB = ConnectDB::getInstance("../../config/config.json");

    $arr = Book::selectAllBook($DB);
    bookForm();
    tableBook($arr);
    ?>
</body>

</html>