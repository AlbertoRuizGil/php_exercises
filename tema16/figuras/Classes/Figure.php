<?php

  abstract class Figure{
    private $sides;
    private $size;
    private $color;

    public function __construct($sides, $size, $color){
      $this->sides = $sides;
      $this->size = $size;
      $this->color = $color;
    }

    abstract public function paintFigure();
  }

?>