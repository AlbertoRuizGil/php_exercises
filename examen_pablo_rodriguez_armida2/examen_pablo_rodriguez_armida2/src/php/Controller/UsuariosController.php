<?php
require "../Model/Connection.php";
require "../Model/Usuarios.php";
require "../Model/Viviendas.php";
require "../Model/Compras.php";

session_start();

$confPath = "../../conf/config.json";
$con = new Connection($confPath);
$pdo = $con->getPdo();


if (isset($_POST["mail"]) && isset($_POST["password"])) {
    $mail = $_POST["mail"];
    $pass = $_POST["password"];
    $user = new Usuarios();
    $sub = $user->registered($pdo, $mail, $pass);

    if($sub){
        $compra = new Compras();
        $compra->insert($pdo,$sub,$_SESSION["id"],date('l jS \of F Y h:i:s A'));

        $comprador = $sub;
        $casaComprada = $_SESSION["id"];
        $fecha = date('l jS \of F Y h:i:s A');
        $arr = array("Comprador"=>$comprador,"Casa"=>$casaComprada,"Fecha"=>$fecha);
        $json = json_encode($arr,true);
        file_put_contents("../../../mail/mail.json", $json, FILE_APPEND);
        header("Location: ../Controller/Mail.php");
    }else{
        header("Location: ../View/filtro.php");
    }
} else {
    header("Location: ../View/filtro1.php");
}