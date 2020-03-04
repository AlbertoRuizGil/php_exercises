CREATE TABLE IF NOT EXISTS productos (
  codigo_producto  char(5) NOT NULL PRIMARY KEY,
  nombre varchar(100) NOT NULL,
  descripcion mediumtext,
  imagen varchar(100),
  precio DEC(6,2) NOT NULL
)ENGINE = InnoDB DEFAULT CHARSET = utf8;

INSERT INTO productos (codigo_producto, nombre, descripcion, imagen, precio)
    VALUES
        ("00001",
        "Camiseta de Zayas",
        "Esta camiseta es de 100% algodon y nos representa a nuestro Instituto",
        "./images/00001.jpg",
         17.95),
         ("00002",
         "Pegatina para parachoques ", 
         "Con mucho color , esta pegatina nos permite identificarnos como alumnos del IES Maria de Zayas",
         "./images/00002.jpg",
         5.95),
         ("00003",
         "Taza de Cafe",
         "Con nuestro logo podremos beber un cafe cada mañana en esta taza de buena porcelana. Se puede meter al lavaplatos y microhondas.",
         "./images/00003.jpg",
         8.95),
         ("00004",
         "Disfraz de Superheroe",
         "Tenemos una selección completa de colores y tamaños para que usted elija . Este traje es elegante, con estilo , y muestra las  habilidades de lucha contra el crimen o habilidades intrigantes mal.",
         "./images/00004.jpg",
         99.95),
         ("00005",
         "Gancho pequeño",
         "Este gancho especializado te sacará de los lugares más estrechos. Especialmente diseñado para la portabilidad y el sigilo .Tenga en cuenta Que este gancho viene con un límite de peso",
         "./images/00005.jpg",
         139.95),
         ("00006",
         "Gancho grande", 
         "Gran versión de nuestro gancho de ataque y será seguro de transportar",
         "./images/00006.jpg",
         199.95);

CREATE TABLE IF NOT EXISTS clientes (
  cod_cliente INTEGER NOT NULL PRIMARY KEY,
  nombre  VARCHAR(20) NOT NULL,
  direccion  VARCHAR(50),
  email VARCHAR(100) NOT NULL
)ENGINE = InnoDB DEFAULT CHARSET = utf8;

INSERT INTO clientes VALUES (7499,'ALLEN','Romero 2','allen11@gmail.com');
INSERT INTO clientes VALUES (7369,'SMITH',null,'smith11@gmail.com');
INSERT INTO clientes VALUES (7521,'WARD','Velazquez 18','ward11@gmail.com');
INSERT INTO clientes VALUES (7566,'JONES',null,'jones11@gmail.com');
INSERT INTO clientes VALUES (7654,'MARTIN','Gran Via 25','martin11@gmail.com');
INSERT INTO clientes VALUES (7698,'BLAKE',null,'blake11@gmail.com');
INSERT INTO clientes VALUES (7782,'CLARK','Serrano 67','clark11@gmail.com');
INSERT INTO clientes VALUES (7788,'SCOTT',null,'scott11@gmail.com');
INSERT INTO clientes VALUES (7839,'KING',null,'king11@gmail.com');
INSERT INTO clientes VALUES (7844,'TURNER',null,'turner11@gmail.com');
INSERT INTO clientes VALUES (7876,'ADAMS','Infante Don Luis','adams11@gmail.com');
INSERT INTO clientes VALUES (7900,'JAMES',null,'james11@gmail.com');
INSERT INTO clientes VALUES (7902,'FORD','Ortega y Gasset 67','ford11@gmail.com');
INSERT INTO clientes VALUES (7934,'MILLER',null,'miller11@gmail.com');

CREATE TABLE IF NOT EXISTS detalles_compra (
  cod_compra INTEGER UNSIGNED NOT NULL,
  cantidad_producto INTEGER UNSIGNED NOT NULL,
  cod_producto CHAR(5) NOT NULL,
  cod_cliente INTEGER UNSIGNED NOT NULL,
  FOREIGN KEY (cod_producto) REFERENCES productos(codigo_producto)
)ENGINE = InnoDB DEFAULT CHARSET = utf8;	


CREATE TABLE IF NOT EXISTS cesta_temporal (
  sesion  CHAR(50) NOT NULL,
  cod_producto CHAR(5) NOT NULL,
  cantidad INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY (sesion, cod_producto),
  FOREIGN KEY (cod_producto) REFERENCES productos(codigo_producto)
)ENGINE = InnoDB DEFAULT CHARSET = utf8;	
