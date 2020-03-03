<?php

  class Usuario {
    private $mail;
    private $pass;
    private $nombreUser;

    public function __construct($mail, $pass, $nombreUser){
      $this->mail = $mail;
      $this->pass = $pass;
      $this->nombreUser = $nombreUser;
    }

    public static function recorrerXML($xml_file, $db){
      echo "Crea los usuarios";
      $usuarios_doc = new DOMDocument; 
      $usuarios_doc->load($xml_file);

      $usuarios = $usuarios_doc->documentElement;
      $list = $usuarios->getElementsByTagName('usuario');

      foreach($list as $usuario){
        $mail = $usuario->getElementsByTagName("mail")->item(0)->textContent;
        $pass = $usuario->getElementsByTagName("pass")->item(0)->textContent;
        $nombreUser = $usuario->getElementsByTagName("nombreUser")->item(0)->textContent;

        $user = new Usuario($mail, $pass, $nombreUser);
        $user->insertarUsuario($db);
      }
    }

    public function insertarUsuario($db){
      $conexion = $db->getConnection();
      $sql = "INSERT INTO usuarios (mail, pass, nombreUser) VALUES (?,?,?);";
      $statement = $conexion->prepare($sql);
      $statement->bindParam(1, $this->mail);
      $statement->bindParam(2, $this->pass);
      $statement->bindParam(3, $this->nombreUser);
      $statement->execute();
    }
  }

?>