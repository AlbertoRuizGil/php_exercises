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
  date_start DATETIME,
  date_end DATETIME
);

CREATE TABLE IF NOT EXISTS customer(
  id INT(10) AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(255),
  surname VARCHAR(255),
  email VARCHAR(255),
  type_user ENUM ("basic", "premium"),
  user VARCHAR(255),
  pass VARCHAR(255)
);
COMMIT;


