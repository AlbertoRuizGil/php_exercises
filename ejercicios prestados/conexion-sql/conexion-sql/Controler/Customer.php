<?php
session_start();
include_once("../Model/ConnectDB.php");
require_once("../Model/Customer.php");

$DB = ConnectDB::getInstance("../config/config.json");

if ($_POST["submit"] === "insert") {
    $customer = new Customer($_POST["firstname"], $_POST["surname"], $_POST["email"], $_POST["pass"], $_POST["subscription"]);
    $_SESSION["customer"] = serialize($customer);
    $customer->insertCustomer($DB);
}
if ($_POST["submit"] === "view") {
    $arr = Customer::selectAllCustomer($DB);
    $_SESSION["tableCustomer"] = $arr;
}
if ($_POST["submit"] === "delete") {
    $arr = Customer::deleteCustomer($DB, $_POST["id"]);
}


header("Location: ../View/Customer/Customer.php");

?>
