<?php

  $author = "Joe Hill";
  $title = "Locke and Key";
  $price = 40;
  $publication = 2001;
  $genre = "Novel grafica";

  $books_xml = simplexml_load_file("./books.xml");

  $book = $books_xml->addChild("Book");
  $book->addAttribute("id", 5);

  var_dump($books_xml);

  $book->addChild("Author", $author);
  $book->addChild("Title", $title);
  $book->addChild("Price", $price);
  $book->addChild("PublishDate", $publication);
  $book->addChild("Genre", $genre);

  $books_xml->asXML("./books.xml");
?>