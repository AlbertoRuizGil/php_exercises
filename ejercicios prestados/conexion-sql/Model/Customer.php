<?php

class Customer
{
    private $id;
    private $firstname;
    private $surname;
    private $email;
    private $pass;
    private $subscription;
  
    public function __construct($id, $firstname, $surname, $email, $pass, $subscription)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->email = $email;
        $this->pass = $pass;
        $this->subscription= $subscription;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getfirstname()
    {
        return $this->firstname;
    }

    public function getsurname()
    {
        return $this->surname;
    }

    public function getemail()
    {
        return $this->email;
    }

    public function getsubscription()
    {
        return $this->subscription;
    }

    public function getpass()
    {
        return $this->pass;
    }

    public static function insertCustomer($DB, $firstname, $surname, $email, $pass, $subscription)
    {
        $query = "INSERT INTO `Customer`(firstname, surname, email, pass, subscription) VALUES (?,?,?,?,?)";
        $pdo = $DB->getConnectionDB();
        $statement = $pdo->prepare($query);
        $statement->bindParam(1, $firstname);
        $statement->bindParam(2, $surname);
        $statement->bindParam(3, $email);
        $statement->bindParam(4, $pass);
        $statement->bindParam(5, $subscription);
        $statement->execute();
    }

    public static function selectCustomer($DB, $email)
    {
        $query = "SELECT * FROM Customer WHERE email=:email";
        $pdo = $DB->getConnectionDB();
        $statement = $pdo->prepare($query);
        $statement->bindParam(":email", $email);
        $statement->execute();
        $arr = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $arr;
    }

    public static function selectAllCustomer($DB)
    {
        $query = "SELECT * FROM Customer";
        $pdo = $DB->getConnectionDB();
        $statement = $pdo->prepare($query);
        $statement->execute();
        $arr = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $arr;
    }

    public static function deleteCustomer($DB, $id)
    {
        $query = "DELETE FROM Customer WHERE id=:id";
        $pdo = $DB->getConnectionDB();
        $statement = $pdo->prepare($query);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public static function isUserRegistered($DB, $email){
        $query = "SELECT * FROM Customer WHERE email=:email";
        $pdo = $DB->getConnectionDB();
        $statement = $pdo->prepare($query);
        $statement->bindParam(":email", $email);
        $statement->execute();
        $arr = $statement->fetch();
        if ($arr) {
            return true;
        } else {
            return false;
        }
    }

    public function correctPass($DB)
    {
        $query = "SELECT * FROM Customer WHERE email=:email";
        $pdo = $DB->getConnectionDB();
        $statement = $pdo->prepare($query);
        $statement->bindParam(":email", $this->getemail());
        $statement->execute();
        $arr = $statement->fetch();
        if ($arr["pass"] === $this->getpass()) {
            return true;
        } else {
            return false;
        }
    }

    public function registerUser($DB)
    {
        $query = "INSERT INTO `Customer`(email, pass) VALUES (?,?)";
        $pdo = $DB->getConnectionDB();
        $statement = $pdo->prepare($query);
        $statement->bindParam(1, $this->user);
        $statement->bindParam(2, $this->pass);
        $statement->execute();
    }
}
