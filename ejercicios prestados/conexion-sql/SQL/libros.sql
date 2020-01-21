use libros;
CREATE TABLE IF NOT EXISTS Book
(
  id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  isbn varchar(13) NOT NULL,
  title varchar(255) NOT NULL,
  author varchar(255) NOT NULL,
  stock smallint(5) NOT NULL,
  price float NOT NULL
) ENGINE=INNODB;
CREATE TABLE IF NOT EXISTS Customer
(
  id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  firstname varchar(255) NOT NULL,
  surname varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  pass varchar(255) NOT NULL,
  subscription enum('basic', 'premium') NOT NULL
) ENGINE=INNODB;
CREATE TABLE IF NOT EXISTS Sale
(
  id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  customer_id int(10) NOT NULL,
  saleDate datetime NOT NULL,
  FOREIGN KEY(customer_id) REFERENCES Customer(id) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=INNODB;
CREATE TABLE IF NOT EXISTS Borrowed_books 
(
  customer_id int(10) NOT NULL,
  book_id int(10) NOT NULL,
  borrowStart datetime NOT NULL,
  borrowEnd datetime NOT NULL,
  PRIMARY KEY(customer_id,book_id),
  FOREIGN KEY(customer_id) REFERENCES Customer(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(book_id) REFERENCES Book(id) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=INNODB;
CREATE TABLE IF NOT EXISTS Sale_book 
(
  book_id int(10) NOT NULL,
  sale_id int(10) NOT NULL,
  amount smallint(5) NOT NULL,
  PRIMARY KEY(book_id,sale_id),
  FOREIGN KEY(sale_id) REFERENCES Sale(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(book_id) REFERENCES Book(id) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=INNODB;