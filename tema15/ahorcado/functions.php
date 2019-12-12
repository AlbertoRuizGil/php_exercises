<?php

  function paintFront(){
    echo <<<EOD

      <div class="word">
EOD;
      paintWord();      
      
    echo <<<EOD
      </div>

      <div class="keyboard">
        <form method="post" action="process.php">
EOD;
    paintKeyboard();

    echo <<<EOD
        </form>
      </div>

      <div class="drawing"></div>

      <div class="fails">
EOD;

    paintFails();

    echo "</div>";

  }

  function paintWord(){
    $word = $_SESSION["word"];
    for($i=0; $i<count($word); $i++){
      echo "<div class='word-letter'>";
      if(in_array($word[$i], $_SESSION["pushedkeys"])){
        echo $word[$i];
      }else{
        echo "_";
      }
      echo "</div>";
    }
  }

  function paintKeyboard(){
    require("data.php");
    $disabled="";
    for($i=0; $i<count($letters); $i++){
      if(in_array($letters[$i], $_SESSION["pushedkeys"])){
        $disabled = "disabled";
      }else{
        $disabled = "visible";
      }
      echo "<input type='submit' name='char' value='" . $letters[$i] . "' class='keyboard-" . $disabled . "'>";
    }
  }

  function paintFails(){
    echo "<div class='fails-count'>" . $_SESSION["fails"] . " (MAX 5 FAILS)</div>";
  }

  function randomWord(){
    require("data.php");
    $numrand = rand(0, (count($words)-1));
    $randword = $words[$numrand];
    $arrword = str_split($randword);
    return $arrword;
  }

  function checkOver(){
    $word = $_SESSION["word"];
    for($i=0; $i<count($word); $i++){
      if(!in_array($word[$i], $_SESSION["pushedkeys"])){
        return false;
      }
    }
    return true;
  }

?>


