<?php
require_once 'conexion.php';

class LoginController{

    private $dbConnection = null;

    public function __construct() {
        $this->dbConnection = new DBConnection();
    }

    public function index(){
        require_once 'views/login.php';
    }
    public function login($username, $password){
        $query = "SELECT * FROM usuarios WHERE usuario = '$username' AND contrasenia = '$password'";
        $result = $this->dbConnection->cn->query($query);
        return $result->num_rows > 0;
    }
}