<?php
session_start();

if($_POST["check"] === "si"){
    $_SESSION["id"] = $_POST["id"];
    header("Location: ../View/login.php");
}else{
    header("Location: ../View/filtro1.php");
}