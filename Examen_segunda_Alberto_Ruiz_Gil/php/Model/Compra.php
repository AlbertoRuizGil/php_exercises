<?php

  class Compra {

     public static function insertarCompra($db, $cod_cliente, $cod_producto, $cantidad_producto){
       $conexion = $db->getConnection();
       $number = rand(1, 500);
       $sql = "INSERT INTO detalles_compra (cod_compra, cantidad_producto, cod_producto, cod_cliente) VALUES (?,?,?,?);";
       $statement = $conexion->prepare($sql);
       $statement->bindParam(1, $number);
       $statement->bindParam(2, $cantidad_producto);
       $statement->bindParam(3, $cod_producto);
       $statement->bindParam(4, $cod_cliente);
       $statement->execute();
     }
  }

?>