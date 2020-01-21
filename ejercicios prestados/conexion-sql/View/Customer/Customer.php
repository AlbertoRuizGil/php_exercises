<?php
session_start();
require_once("customerFunctions.php");
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
    CustomerForm();
    if (isset($_SESSION["tableCustomer"])) {
        tableCustomer($_SESSION["tableCustomer"]);
    }
    ?>
</body>

</html>