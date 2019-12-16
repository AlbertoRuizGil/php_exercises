<?php

  class Circle extends Figure{
    private $sides;
    private $size;
    private $color;

    public function __construct($sides, $size, $color){
      parent::_construct(int $sides, int $size, string $color);
    }

    public function paintFigure(){
      
      imageellipse ($image, $cx, $cy, $width, $height, $color);
    }
  }


?>