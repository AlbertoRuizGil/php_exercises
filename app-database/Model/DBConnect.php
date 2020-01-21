<?php

class DBConnect {        
    private $_connection;
    private static $_instance= null; //Instancia única
 
    // Constructor
    public function __construct($configFile){
      $config = json_decode(file_get_contents($configFile), TRUE);
      $dsn = "{$config['DBType']}:host={$config['Host']};dbname={$config['DBName']}";
      $user = "{$config['User']}";
      $password = "{$config['Password']}";
      try{
        $this->_connection = new PDO($dsn,$user,$password);
      } catch (PDOException $e){
        echo "Falló la conexión: " . $e->getMessage();
      }
      
    }

    public static function getInstance($configFile){
      if(!self::$_instance) // Si no está instanciada se crea una
      { 
          self::$_instance = new self($configFile);
      }
      return self::$_instance;
  }
 
    // Método mágico que está vacia para evitar duplicados en la conexión
    private function __clone() { }
 
    // Obtener la conexión
    public function getConnection(){

      return $this->_connection;
    }
     
    public function exec($sql){
      
      $connect = $this->getConnection();
      $statement = $connect->prepare($sql);
      $statement->execute();

    }
 
}

?>