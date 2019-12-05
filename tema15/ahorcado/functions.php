<?php

  function paintFront(){
    echo <<<EOD
      <h1 class="maintitle">AHORCADO</h1>

      <div class="word"></div>

      <div class="keyboard">
        <form method="post">
EOD;
    paintKeyboard();

    echo <<<EOD
        </form>
      </div>

      <div class="drawing"></div>
EOD;
  }

  function paintWord(){

  }

  function paintKeyboard(){
    require("data.php");
    //Eliminar el array más tarde
    $arraydeteclaspulsadas= array("");
    $disabled="";
    for($i=0; $i<count($letters); $i++){
      if(!in_array($letters[$i], $arraydeteclaspulsadas)){
        $disabled = "disabled";
      }
      echo "<input type='submit' name='" . $letters[$i] . "' value='" . $letters[$i] . "' " . $disabled . ">";
    }
  }

?>

</form>

