<?php

  function getNextID($books_arr){
    return $books_arr[count($books_arr)-1]->attributes() + 1;
  }

  function checkTitle($books_arr, $input):bool{
    for($i=0; $i<count($books_arr["Book"]); $i++){
      if(checkMatches($books_arr["Book"][$i]->Title, $input)){
        return true;
      }
    }
    return false;
  }

  function checkMatches($title, $input){
    $long = strlen($input);
    return stristr($title, substr($input, 0, $long));
  }

?>