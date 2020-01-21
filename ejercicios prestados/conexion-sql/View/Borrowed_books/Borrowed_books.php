<?php
session_start();
require_once("borrowedFunctions.php");
require_once("../../Model/Borrowed_books.php");
require_once("../../Model/ConnectDB.php");
require_once("../../Model/Customer.php");
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
        $arrCustomer = unserialize($_SESSION["customer"])[0];
        $customer = new Customer($arrCustomer["id"], $arrCustomer["firstname"], $arrCustomer["surname"], $arrCustomer["email"], $arrCustomer["pass"], $arrCustomer["subscription"]);
        $arr = Borrowed_books::selectAllMyBorrowed($DB, $customer->getId());
        tableBorrowed($arr);
    ?>
</body>

</html>