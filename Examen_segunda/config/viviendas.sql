
CREATE TABLE IF NOT EXISTS tipos (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  tipo varchar(40) NOT NULL
) ENGINE=InnoDB;

INSERT INTO tipos (`id`, `tipo`) VALUES
(1, 'piso'),
(2, 'apartamento'),
(3, 'adosado'),
(4, 'chalet'),
(5, 'finca'),
(6, 'parcela');


CREATE TABLE IF NOT EXISTS viviendas (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  tipo varchar(11) NOT NULL,
  zona varchar(11) NOT NULL,
  precio int(11) NOT NULL,
  dormitorios int(11) NOT NULL,
  garaje varchar(2) NOT NULL,
  jardin varchar(2) NOT NULL,
  padel varchar(2) NOT NULL,
  piscina varchar(2) NOT NULL,
  zonascomunes varchar(2) NOT NULL,
  vendida varchar(2) NOT NULL,
  imagen varchar(200)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS localidades (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  lugar varchar(40) NOT NULL
) ENGINE=InnoDB;



INSERT INTO localidades (`id`, `lugar`) VALUES
(1, 'Pozuelo'),
(2, 'Las Rozas'),
(3, 'Majadahonda'),
(4, 'Madrid'),
(5, 'Villalba'),
(6, 'Alcobendas'),
(7, 'Alcorcon');

