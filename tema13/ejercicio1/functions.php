<?php

  function paintForm(){
    echo <<<EOD
    <form action="" method="post">
      <input type="number" name="rows" required placeholder="rows">
      <input type="number" name="columns" required placeholder="columns">
      <input type="number" name="width" placeholder="width">
      <input type="number" name="height" placeholder="height">
      <input type="text" name="background" placeholder="background-color">
      <input type="text" name="border" placeholder="border">
      <input type="submit" name="submit" value="submit">
    </form>
EOD;

  }

  function createTable($args){
    echo "<table>";
    for($i=0; $i<=$args[0]; $i++){
      echo <<<EOD
      <table>
EOD;
      for($j=0; $j<=$args[1], $j++){

      }
    }
    
  }

?>




<!--<table></table> -->