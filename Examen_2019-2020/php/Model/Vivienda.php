<?php

  class Vivienda{

    private $tipo;
    private $zona;
    private $dormitorios;
    private $precio;
    private $imagen;
    private $extras;

    public function __construct($tipo, $zona, $dormitorios, $precio, $imagen, $extras){
      $this->tipo = $tipo;
      $this->zona = $zona;
      $this->dormitorios = $dormitorios;
      $this->precio = $precio;
      $this->imagen = $imagen;
      $this->extras = $extras;
    }

    public function insertarVivienda($db){

        $garage = $this->extras["garage"];
        $jardin = $this->extras["jardin"];
        $piscina = $this->extras["piscina"];
        $zonascomunes = $this->extras["zonascomunes"];
        $padel = $this->extras["padel"];

        $conexion = $db->getConnection();
        $sql = "INSERT INTO viviendas (tipo, zona, dormitorios, precio, imagen, garage, jardin, piscina, padel, zonascomunes) VALUES (?,?,?,?,?,?,?,?,?,?);";
        $statement = $conexion->prepare($sql);
        $statement->bindParam(1, $this->tipo);
        $statement->bindParam(2, $this->zona);
        $statement->bindParam(3, $this->dormitorios);
        $statement->bindParam(4, $this->precio);
        $statement->bindParam(5, $this->imagen);
        $statement->bindParam(6, $garage);
        $statement->bindParam(7, $jardin);
        $statement->bindParam(8, $piscina);
        $statement->bindParam(9, $padel);
        $statement->bindParam(10, $zonascomunes);

        $statement->execute();

    }

    public static function recorrerXML($xml_file, $db){
      echo "Crea las viviendas";
      $viviendas_doc = new DOMDocument; 
      $viviendas_doc->load($xml_file);

      $viviendas = $viviendas_doc->documentElement;
      $list = $viviendas->getElementsByTagName('vivienda');

      foreach($list as $vivienda){
    
        $tipo = $vivienda->getElementsByTagName("tipo")->item(0)->textContent;
        $zona = $vivienda->getElementsByTagName("zona")->item(0)->textContent;
        $dormitorios = $vivienda->getElementsByTagName("dormitorios")->item(0)->textContent;
        $precio = $vivienda->getElementsByTagName("precio")->item(0)->textContent;
        $imagen = $vivienda->getElementsByTagName("image")->item(0)->textContent;

        $extras["garage"] = $vivienda->getElementsByTagName("extras")->item(0)->getElementsByTagName("garage")->item(0)->textContent;
        $extras["jardin"] = $vivienda->getElementsByTagName("extras")->item(0)->getElementsByTagName("jardin")->item(0)->textContent;
        $extras["piscina"] = $vivienda->getElementsByTagName("extras")->item(0)->getElementsByTagName("piscina")->item(0)->textContent;
        $extras["padel"] = $vivienda->getElementsByTagName("extras")->item(0)->getElementsByTagName("padel")->item(0)->textContent;
        $extras["zonascomunes"] = $vivienda->getElementsByTagName("extras")->item(0)->getElementsByTagName("zonascomunes")->item(0)->textContent;

        $viv = new Vivienda($tipo, $zona, $dormitorios, $precio, $imagen, $extras);
        $viv->insertarVivienda($db);

      }
    }

  }



?>