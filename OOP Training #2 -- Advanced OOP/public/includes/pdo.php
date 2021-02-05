<?php

class Database{

    // Connections Properties
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbname = "virtualines";

    // Connection Handler
    private $dbh;

    //Error Handler
    private $error;

    //Statement Handler
    private $stmt;

    // Open Connection
    public function __construct(){
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;

        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pwd, $options);
//            echo "Connection Successful";

        } catch(PDOException $errorobj) {
            $this->error = $errorobj->getMessage();
            echo $this->error;
        }
    }
    // Method to Handle Statement
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    // Method to Handle Bind Values
    public function bind($param, $value, $type){
        $this->stmt->bindValue($param, $value, $type);

    }

    // Method to Execute Statement
    public function execute(){
        return $this->stmt->execute();
    }

    // Method to Fetch One Value
    public function fetchSingle(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Method to Fetch Multiple Values
    public function fetchMultiple(){
        $this->execute();

        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>