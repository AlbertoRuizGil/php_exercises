<?php

  $books_xml = simplexml_load_file("../XML/books.xml");

  $book_arr = (array)$books_xml;

  echo "<tr><td>Autor</td><td>Título</td></tr>";

  for($i=0; $i<count($book_arr["Book"]); $i++){

    echo "<tr>";
    echo "<td>" . $book_arr["Book"][$i]->Author . "</td>";
    echo "<td>" . $book_arr["Book"][$i]->Title . "</td>";
    echo "</tr>";
  }
?>