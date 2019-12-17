<?php

  function paintForm(){
    echo <<<EOD
    <form action="process.php" method="post">
      <label for="sides">Sides</label></br>
      <input type="number" name="sides"></br>
      <label for="size">Size</label></br>
      <input type="number" name="size"></br>
      <label for="quantity">Quantity</label></br>
      <input type="number" name="quantity"></br>
      <label for="color">Color</label>
      <select name="color">
        <option selected disabled>PICK COLOR</option>
        <option value="yellow">YELLOW</option>
        <option value="red">RED</option>
        <option value="blue">BLUE</option>
        <option value="white">WHITE</option>
      </select>
      </br>
  
      <input type="submit" value="Paint">
  
    </form>
EOD;
  }

?>


