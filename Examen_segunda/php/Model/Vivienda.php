<?php

  class Vivienda{
    private $tipo;
    private $zona;
    private $dormitorios;
    private $precio;
    private $image;
    private $extras;

    public function __construct($tipo, $zona, $dormitorios, $precio, $image, $extras){
      $this->tipo = $tipo;
      $this->zona = $zona;
      $this->dormitorios = $dormitorios;
      $this->precio = $precio;
      $this->image = $image;
      $this->extras = $extras;
    }

    public static function recorrerXML($xml, $db){
      $viviendas_doc = new DOMDocument; 
      $viviendas_doc->load($xml);
  
      $viviendas = $viviendas_doc->documentElement;
      $list = $viviendas->getElementsByTagName('vivienda');
  
      foreach($list as $vivienda){
        $tipo = $vivienda->getElementsByTagName("tipo")->item(0)->textContent;
        $zona = $vivienda->getElementsByTagName("zona")->item(0)->textContent; 
        $dormitorios = $vivienda->getElementsByTagName("dormitorios")->item(0)->textContent;
        $precio = $vivienda->getElementsByTagName("precio")->item(0)->textContent;
        $image = $vivienda->getElementsByTagName("image")->item(0)->textContent; 
  
        $jardin = $vivienda->getElementsByTagName("extras")->item(0)->getElementsByTagName("jardin")->item(0)->textContent;
        $garaje = $vivienda->getElementsByTagName("extras")->item(0)->getElementsByTagName("garage")->item(0)->textContent;
        $zonascomunes = $vivienda->getElementsByTagName("extras")->item(0)->getElementsByTagName("zonascomunes")->item(0)->textContent;
        $piscina = $vivienda->getElementsByTagName("extras")->item(0)->getElementsByTagName("piscina")->item(0)->textContent;
        $padel = $vivienda->getElementsByTagName("extras")->item(0)->getElementsByTagName("padel")->item(0)->textContent;
  
        $extras = array(
          "jardin"=>$jardin,
          "garaje"=>$garaje,
          "zonascomunes"=>$zonascomunes,
          "piscina"=>$piscina,
          "padel"=>$padel
        );

  
        $viv = new Vivienda($tipo, $zona, $dormitorios, $precio, $image, $extras);
  
        $viv->insertarVivienda($db);
  
      }
    }

    public function insertarVivienda($db){
      $vendida = "no";
      $conexion = $db->getConection();
      $sql = "INSERT INTO viviendas (tipo, zona, precio, dormitorios, garaje, jardin, padel, piscina, zonascomunes, imagen, vendida) VALUES (?,?,?,?,?,?,?,?,?,?,?);";
      $statement = $conexion->prepare($sql);
      $statement->bindParam(1, $this->tipo);
      $statement->bindParam(2, $this->zona);
      $statement->bindParam(3, $this->precio);
      $statement->bindParam(4, $this->dormitorios);
      $statement->bindParam(5, $this->extras["garaje"]);
      $statement->bindParam(6, $this->extras["jardin"]);
      $statement->bindParam(7, $this->extras["padel"]);
      $statement->bindParam(8, $this->extras["piscina"]);
      $statement->bindParam(9, $this->extras["zonascomunes"]);
      $statement->bindParam(10, $this->image);
      $statement->bindParam(11, $vendida);
      if(!$statement->execute()){
        throw new PDOException("Ocurrió un problema y no se insertó la fila " . $statement->errorInfo()[2]);
      }
    }

    public static function buscarViviendas($db, $tipo, $zona, $dormitorios, $precio, $extras){
      $dormitorios = (int)$dormitorios;
      $precio = (int)$precio;
      $garaje = $extras["garaje"];
      $piscina = $extras["piscina"];
      $padel = $extras["padel"];
      $jardin = $extras["jardin"];
      $zonascomunes = $extras["zonascomunes"];

      switch($precio){
        case 0:
          $condition = "AND precio<100000";
        break;
        case 100000:
          $condition = "AND precio>=100000 AND precio<200000";
        break;
        case 200000:
          $condition = "AND precio>=200000 AND precio<300000";
        break;
        case 300000:
          $condition = "AND precio>=300000";
        break;
      }

      $precio_alto = $precio + 100000;
      $conexion = $db->getConection();

      $sql = "SELECT * FROM viviendas 
      WHERE tipo='$tipo' 
      AND zona='$zona'
      AND dormitorios=$dormitorios
      $condition
      AND garaje='$garaje'
      AND piscina='$piscina'
      AND padel='$padel'
      AND zonascomunes='$zonascomunes'
      AND jardin='$jardin'
      AND vendida='no'";

      $statement = $conexion->prepare($sql);
      $statement->execute();
      
      $arr = $statement->fetchAll();

      return $arr;
    }

    public static function adquirirVivienda($db, $id){
      $conexion = $db->getConection();
      $sql_compra = "UPDATE viviendas SET vendida='si' WHERE id=$id";
      $statement_compra = $conexion->prepare($sql_compra);
      $statement_compra->execute();

      $sql = "SELECT * FROM viviendas WHERE id=$id"; 
      $statement = $conexion->prepare($sql);
      $statement->execute();
      $arr = $statement->fetch(PDO::FETCH_ASSOC);
      return $arr;
    }

  }
?>