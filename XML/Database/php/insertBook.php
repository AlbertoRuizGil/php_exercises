<?php

  $author = $_POST["author"];
  $title = $_POST["title"];
  $price = $_POST["price"];
  $publication = $_POST["publication"];
  $genre = $_POST["genre"];

  $books_xml = simplexml_load_file("./XML/books.xml");

  $book = $books_xml->addChild("Book");
  $book->addAttribute("id", 5);

  $book->addChild("Author", $author);
  $book->addChild("Title", $title);
  $book->addChild("Price", $price);
  $book->addChild("PublishDate", $publication);
  $book->addChild("Genre", $genre);

  $books_xml->asXML("./XML/books.xml");

  echo "$author, $title, $price, $publication, $genre";
?>