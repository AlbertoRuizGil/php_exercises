<?php

  class Cesta{
    private $productos;

    public function __construct(){
      $this->productos = array();
    }

    public function getProductos(){
      return $this->productos;
    }

    public function insertarProducto($producto, $cantidad, $db){
      $conexion = $db->getConnection();
      $sql = "SELECT codigo_producto, nombre, precio FROM productos where codigo_producto='$producto'";
      $statement = $conexion->prepare($sql);
      $statement->execute();

      if($statement->rowcount() == 0){
        throw new Exception("No existe ningún producto con ese código");
      }else if($this->buscar($producto)){
        $i = $this->buscarPosicion($producto);
        echo "pasa por aqui " . $i;
        $this->productos[$i]["cantidad"]+=$cantidad;
      }else{
        $arrTemp = $statement->fetchAll();
        $precio = $arrTemp[0]["precio"];
        $nombre = $arrTemp[0]["nombre"];
        array_push($this->productos, array(
          "producto"=> $producto,
          "nombre" => $nombre,
          "precio" => $precio,
          "cantidad" => $cantidad
        ));
      }
    }

    public function buscar($producto){
      for($i=0; $i<count($this->productos); $i++){
        if(in_array($producto, $this->productos[$i])){
          return true;
        }
      }
      return false;
    }

    public function buscarPosicion($producto){
      for($i=0; $i<count($this->productos); $i++){
        if(in_array($producto, $this->productos[$i])){
          return $i;
        }
      }
      return false;
    }

    public function precioTotal(){
      $precio_total = 0;
      for($i=0; $i<count($this->productos); $i++){
        $precio_total+=$this->productos[$i]["precio"];
      }
      return $precio_total;
    }

    public function eliminarProducto($producto, $db){
      $nueva_cesta = new Cesta();
      for($i=0; $i<count($this->productos); $i++){
        if(!in_array($producto, $this->productos[$i])){
          $nueva_cesta->insertarProducto($this->productos[$i]["producto"], $this->productos[$i]["cantidad"], $db);
        }
      }
      return $nueva_cesta;
    }

    public function __toString(){
      if(empty($this->productos)){
        $str = "No hay productos en la cesta";
      }
      $str = <<<EOD
      <table>
        <tr>
          <th>Producto</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>Subtotal</th>
          <th>Eliminar</th>
        </tr>
EOD;
      for($i=0; $i<count($this->productos); $i++){
        $str= $str . "<tr>";
        $str=$str . "<td>" . $this->productos[$i]["nombre"] . "</td>";
        $str=$str . "<td>" . $this->productos[$i]["precio"] . "</td>";
        $str=$str . "<td>" . $this->productos[$i]["cantidad"] . "</td>";
        $subtotal = 0;
        $subtotal = $this->productos[$i]["cantidad"] * $this->productos[$i]["precio"];
        $str=$str . "<td>" . $subtotal . "</td>";
        $str=$str . "<td><form action='../Controller/controller_borrar_cesta.php' method='post'><input type='hidden' name='producto' value='" .  $this->productos[$i]["producto"] . "'><input type='submit' value='eliminar'></form></td></tr>";
      }

      $str=$str . "<tr><td colspan='3'>TOTAL</td><td>" . $this->precioTotal() ."</td></tr></table>";
      $str=$str . "<form action='../Controller/controller_compra.php' method='post'><input type='submit' value='Comprar'></form>";

      return $str;
    }
  }

  

   

?>