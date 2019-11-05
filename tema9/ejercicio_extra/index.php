<?php

    header("Content-Type: image/jpeg");
    $imagen = imagecreatefromjpeg("./img/fondo.jpeg");
    $fuente = 5;
    $x = 75;
    $y = 35;
    $texto = "perro";
    $color = imagecolorallocate($imagen,255, 0, 0);
    imagestring($imagen, $fuente, $x, $y, $texto, $color);
    imagejpeg($imagen);
    imagedestroy($imagen);

?>