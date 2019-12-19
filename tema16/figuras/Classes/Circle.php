<?php

require_once("Figure.php");

  class Circle extends Figure{

    public function __construct($size, $color){
      parent::__construct($size, $color);
    }

    public function paintFigure(){
      $size = parent::getSize();
      $color = parent::getColor();

      $color = $this->hexToRgb($color);

      $im = imagecreatetruecolor($size, $size);
      $background = imagecolorallocate($im, 255, 255, 255);
      $figurecolor = imagecolorallocate($im, $color['r'], $color['g'], $color['b']);
      imagefill($im, 0, 0, $background);
      imagefilledellipse(
        $im, 
        $size * 0.5, 
        $size * 0.5, 
        $size, 
        $size, 
        $figurecolor);
      
      ob_start();
      imagepng($im);
      $buffer = ob_get_contents();
      ob_end_clean();

      $source = 'data:image/jpeg;base64,' . base64_encode($buffer);

      return $source;
    }
  }


?>