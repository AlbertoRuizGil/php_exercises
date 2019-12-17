<?php

  class Circle extends Figure{
    private $sides;
    private $size;
    private $color;

    public function __construct($sides, $size, $color){
      parent::_construct(int $sides, int $size, string $color);
    }

    public function paintFigure(){

      $area = 3,14 * $this->size * $this->size;
      $edge_square_container = sqrt($area);
      $edge_square_container += 100;
      
      imageellipse ($image, $cx, $cy, $width, $height, $color);
    }
  }


?>