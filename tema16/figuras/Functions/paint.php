<?php

  function paintForm(){
    echo <<<EOD
    <div class="form">
    <form action="./Controller/process.php" method="post">
      <div class="checkbox">
        <label for="circle">Circle</label>
        <input type="checkbox" name="figure[]" value="Circle">
        <input type="color" name="Circle-color">
        <label for="Circle-size">Size</label>
        <input type="number" name="Circle-size" value="100">
      </div>
      <div class="checkbox">
        <label for="triangle">Triangle</label>
        <input type="checkbox" name="figure[]" value="Triangle">
        <input type="color" name="Triangle-color">
        <label for="Triangle-size">Size</label>
        <input type="number" name="Triangle-size" value="100">
      </div>
      <div class="checkbox">
        <label for="square">Square</label>
        <input type="checkbox" name="figure[]" value="Square">
        <input type="color" name="Square-color">
        <label for="Square-size">Size</label>
        <input type="number" name="Square-size" value="100">
      </div>
  
      <input type="submit" value="Paint">
  
    </form>
    </div>
EOD;
  }

?>





