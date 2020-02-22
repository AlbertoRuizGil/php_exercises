<?php

  require_once("./functions.php");

  $books_xml = simplexml_load_file("../XML/books.xml");

  $input = $_POST["search"];

  $book_arr = (array)$books_xml;

  if($input == ""){
    echo "<tr><th>Autor</th><th>Título</th><th>Género</th><th>Precio</th><th>Publicación</th><th>Borrar</th></tr>";

    for($i=0; $i<count($book_arr["Book"]); $i++){
      echo "<tr>";
      echo "<td>" . $book_arr["Book"][$i]->Author . "</td>";
      echo "<td>" . $book_arr["Book"][$i]->Title . "</td>";
      echo "<td>" . $book_arr["Book"][$i]->Genre . "</td>";
      echo "<td>" . $book_arr["Book"][$i]->Price . "€</td>";
      echo "<td>" . $book_arr["Book"][$i]->PublishDate . "</td>";
      echo "<td> <button onclick='deleteBook(\"{$book_arr["Book"][$i]->attributes()->id}\")' class='delete-btn'>BORRAR</button> </td>";
      echo "</tr>";
    }
  }else if(checkTitle($book_arr, $input)){
    echo "<tr><th>Autor</th><th>Título</th><th>Género</th><th>Precio</th><th>Publicación</th><th>Borrar</th></tr>";

    for($i=0; $i<count($book_arr["Book"]); $i++){
      if(checkMatches($book_arr["Book"][$i]->Title, $input)){
        echo "<tr>";
        echo "<td>" . $book_arr["Book"][$i]->Author . "</td>";
        echo "<td>" . $book_arr["Book"][$i]->Title . "</td>";
        echo "<td>" . $book_arr["Book"][$i]->Genre . "</td>";
        echo "<td>" . $book_arr["Book"][$i]->Price . "€</td>";
        echo "<td>" . $book_arr["Book"][$i]->PublishDate . "</td>";
        echo "<td> <button onclick='deleteBook(\"{$book_arr["Book"][$i]->attributes()->id}\")' class='delete-btn'>BORRAR</button> </td>";
        echo "</tr>";
      }
    }
  }else{
    echo "No hay resultados";
  }

  
?>

