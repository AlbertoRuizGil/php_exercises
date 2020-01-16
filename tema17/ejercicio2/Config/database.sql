CREATE TABLE IF NOT EXISTS book(
  id INT(10) AUTO_INCREMENT PRIMARY KEY,
  isbn VARCHAR(13),
  title VARCHAR(255),
  author VARCHAR(255),
  stock SMALLINT(5),
  price FLOAT
);

CREATE TABLE IF NOT EXISTS borrowed_books(
  customer_id INT(10) PRIMARY KEY,
  book_id INT(10),
  start DATETIME,
  end DATETIME
);


