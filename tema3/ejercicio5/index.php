<?php

include("controla_entrada.php");

$var = entry_control("Estoesuna prueba");
$bool="";

if($var){
    $bool="true";
}else{
    $bool="false";
}

echo "<p>$bool</p>";

?>