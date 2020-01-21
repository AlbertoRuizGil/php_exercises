<?php
require_once("../../php/commonFunctions.php");

function CustomerForm()
{
    insertCustomer();
    viewAllCustomer();
    deleteCustomer();
}

function insertCustomer()
{
    echo<<<EOD
    <form action="../../Controler/Customer.php" method="POST">
        <input type="text" name="firstname" placeholder="firstname">
        <input type="text" name="surname" placeholder="surname">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="pass" placeholder="pass">
        <input type="radio" name="subscription" value="basic">Basic
        <input type="radio" name="subscription" value="premium">Premium
        <input type="submit" class="" value="insert" name="submit">
    </form>
EOD;
}

function viewAllCustomer()
{
    echo<<<EOD
    <form action="../../Controler/Customer.php" method="POST">
        <input type="submit" class="" value="view" name="submit">
    </form>
EOD;
}

function deleteCustomer()
{
    echo<<<EOD
    <form action="../../Controler/Customer.php" method="POST">
        <input type="text" name="id" placeholder="id to delete">
        <input type="submit" class="" value="delete" name="submit">
    </form>
EOD;
}

function tableCustomer($arr)
{
    echo<<<EOD
     <table class="table">
     <tr>
        <th>ID</th>
        <th>FIRSTNAME</th>
        <th>SURNAME</th>
        <th>EMAIL</th>
        <th>PASSWORD</th>
        <th>SUBSCRIPTION</th>
    </tr>
EOD;
    table($arr);
}
