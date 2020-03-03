CREATE DATABASE IF NOT EXISTS `Inmobiliaria`;
use `Inmobiliaria`;

CREATE TABLE IF NOT EXISTS `tipos` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `tipo` varchar(40) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `viviendas` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `tipo` varchar(11) NOT NULL,
  `zona` varchar(11) NOT NULL,
  `dormitorios` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `garage` varchar(2) NOT NULL,
  `jardin` varchar(2) NOT NULL,
  `padel` varchar(2) NOT NULL,
  `piscina` varchar(2) NOT NULL,
  `zonascomunes` varchar(2) NOT NULL,
  `imagen` longblob
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `zonas` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `zona` varchar(40) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(40) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `mail` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `nombreUser` varchar(40) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `compras` (
  `usuario_id` int(40) NOT NULL,
  `casa_id` int(40) NOT NULL,
  `fecha` varchar(40) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

INSERT INTO
  `tipos` (`id`, `tipo`)
VALUES
  (1, 'Piso'),
  (2, 'Apartamento'),
  (3, 'Adosado'),
  (4, 'Chalet'),
  (5, 'Finca'),
  (6, 'Parcela');

INSERT INTO
  `zonas` (`id`, `zona`)
VALUES
  (1, 'Pozuelo'),
  (2, 'Las Rozas'),
  (3, 'Majadahonda'),
  (4, 'Madrid'),
  (5, 'Villalba'),
  (6, 'Alcobendas'),
  (7, 'Alcorcon');