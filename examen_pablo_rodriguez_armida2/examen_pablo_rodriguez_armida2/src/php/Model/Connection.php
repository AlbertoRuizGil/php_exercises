<?php

class Connection
{
    private $pdo;

    public function __construct($path)
    {

        if (file_exists($path)) {
            $conf = json_decode(file_get_contents($path), true);
            $dsn = "$conf[type]:host=$conf[host];dbname=$conf[name]";
            $user = $conf['user'];
            $password = $conf['password'];
            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->pdo = $pdo;
        }else{
            throw new Exception("File does not exists");
        }
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    public static function createDB($sqlFile, $path)
    {
        if (file_exists($sqlFile) && file_exists($path)) {
        $conf = json_decode(file_get_contents($path), true);

        $dsn = "$conf[type]:host=$conf[host]";
        $user = $conf['user'];
        $password = $conf['password'];
        $pdo = new PDO($dsn, $user, $password);
        $sql = file_get_contents($sqlFile);

        $pdo->exec($sql);
        }else{
            throw new Exception("File does not exists");
        }
    }
}
