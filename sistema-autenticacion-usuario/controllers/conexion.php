<?php

define('DB_SERVER', 'localhost');
define('DB_PORT', 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'admin');
define('DB_NAME', 'system_authenticate_db');

class DBConnection{
    private $host = DB_SERVER;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $database = DB_NAME;

    public $cn;

    public function __construct() {
        $this->cn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if(!$this->cn){
            echo 'Cannot connect to database server';
            exit();
        }
    }

    public function __destruct()
    {
        $this->cn->close();
    }
}