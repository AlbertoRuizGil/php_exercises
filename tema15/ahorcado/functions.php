<?php

  function paintFront(){
    echo <<<EOD
      <h1 class="maintitle">AHORCADO</h1>

      <div class="word"></div>

      <div class="keyboard">
        <form method="post" action="process.php">
EOD;
    paintKeyboard();

    echo <<<EOD
        </form>
      </div>

      <div class="drawing"></div>
EOD;
  }

  function paintWord(){
    $word = $_SESSION["word"];
    $word = str_split($word);
    for($i=0; $i<count($word); $i++){
      
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

  function randomWord(){
    require("data.php");
    $numrand = rand(0, (count($words)-1));
    return $words[$numrand];
  }

?>

</form>

