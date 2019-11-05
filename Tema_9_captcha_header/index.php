<?php
// Establecer el tipo de contenido
header('Content-Type: image/png');

// Crear una imagen desde cero
//$im = imagecreatetruecolor(400, 50);

// imagen de fondo
$im = imagecreatefromjpeg("./img/fondo.jpeg");

// Color de la fuente
$negro = imagecolorallocate($im, 55, 0, 0);

// El texto a dibujar
$texto = 'Holaaaaaaaaaaaaaaa';

// Ruta absoluta de la fuente
$fuente = realpath("./fonts/font2.ttf");

// Añadir el texto a la imagen
imagettftext($im, 20, 10, 20, 50, $negro, $fuente, $texto);

// Pintar la imagen en png
imagepng($im);
imagedestroy($im);
?>