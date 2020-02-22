<?php

  require_once("functions.php");

  $author = trim($_POST["author"]);
  $title = trim($_POST["title"]);
  $price = trim($_POST["price"]);
  $publication = trim($_POST["publication"]);
  $genre = trim($_POST["genre"]);

  if($author != "" &&
    $title != "" &&
    $price != "" &&
    $publication != "" &&
    $genre != ""){

    $books_xml = simplexml_load_file("../XML/books.xml");

    $id = getNextID($books_xml->xpath("/Catalog/Book"));;

    $book = $books_xml->addChild("Book");
    $book->addAttribute("id", $id);

    $book->addChild("Author", $author);
    $book->addChild("Title", $title);
    $book->addChild("Price", $price);
    $book->addChild("PublishDate", $publication);
    $book->addChild("Genre", $genre);

    $books_xml->asXML("../XML/books.xml");

    echo "";
    
    }else{
      echo "DEBE RELLENAR TODOS LOS CAMPOS";
    }

  

?>