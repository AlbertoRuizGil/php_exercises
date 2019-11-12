<?php

        require("createword.php");
        $im = imagecreatefromjpeg("./images/fondo.jpeg");
        $color = imagecolorexact($im, 255, 0, 0);

        $leters = array();
        $font = realpath("./fonts/OpenSans-Regular.ttf");

        for($i=0; $i<strlen($word); $i++){
            $leters = str_split($word);
            $anglerand = rand(0, 180);
            $yrand = rand(25, 80);
            imagefttext($im, 25, $anglerand, (20 + $i*30), $yrand, $color, $font, $leters[$i]);
        }

        header("Content-type:image/jpeg");
        imagejpeg($im);
        imagedestroy($im);

?>