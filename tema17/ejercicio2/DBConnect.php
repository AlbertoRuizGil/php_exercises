<?php

class DBConnect {        
    private $_connection;
    private static $_instance; //The single instance
 
    public static function getInstance(){
        if(!self::$_instance) // If no instance then make one
        { 
            self::$_instance = new self();
        }
        return self::$_instance;
    }
 
    // Constructor
    private function __construct($configFile){
      $config = json_decode(file_get_contents($configFile), TRUE);
      $dsn = "{$config['DBType']}:dbname={$config['DBName']};host={$config['Host']}";;
      $user = "{$config['User']}";
      $password = "{$config['Password']}";
      $this->_connection = new PDO($dsn,$user,$password);
    }
 
    // Magic method clone is empty to prevent duplication of connection
    private function __clone() { }
 
    // Get mysqli connection
    public function getConnection(){

      return $this->_connection;
    }
     
    public function exec($sql){
      
      $connect = getConnection();
      $statement = $connect->prepare($sql);
      $statement = execute();

    }
 
}

?>