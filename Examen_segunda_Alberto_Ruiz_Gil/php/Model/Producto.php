<?php

  class Producto {
    private $codigo_producto;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $precio;

    public function __construct($codigo_producto, $nombre, $descripcion, $imagen, $precio){
      $this->codigo_producto = $codigo_producto;
      $this->nombre = $nombre;
      $this->descripcion = $descripcion;
      $this->imagen = $imagen;
      $this->precio = $precio;
    }


    public static function obtenerProductos($db, $paginas){
      $conexion = $db->getConnection();
      $sql = "SELECT * FROM productos";
      $statement = $conexion->prepare($sql);
      $statement->execute();
      $arrProductos = $statement->fetchAll();
      return $arrProductos;
    }

    public static function obtenerUnProducto($db, $producto){
      $conexion = $db->getConnection();
      $sql = "SELECT * FROM productos WHERE codigo_producto='$producto'";
      $statement = $conexion->prepare($sql);
      $statement->execute();
      $arrProductos = $statement->fetchAll();
      $prod = new Producto(
        $arrProductos[0]["codigo_producto"], 
        $arrProductos[0]["nombre"], 
        $arrProductos[0]["descripcion"], 
        $arrProductos[0]["imagen"], 
        $arrProductos[0]["precio"]);
      return $prod;
    }

    public function __toString(){
      $str = <<<EOD
      <div class='producto'>
          <img src='../../{$this->imagen}'/>
          <p>{$this->nombre}</p>
          <p>{$this->descripcion}</p>
          <p>{$this->precio}</p>
          <form action='../Controller/controller_añadir_cesta.php' method='post'>
            <input type="hidden" name="producto" value='{$this->codigo_producto}'>
            <input type="number" min="1" name="cantidad" value="1">
            <input type="submit" value="comprar">
          </form>
      </div>
EOD;
      return $str;
    }
  }

?>