<?php namespace App\Controllers;

class Connector {

    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $conn;
    
    function __construct()
    {
        $this->servername = '';
        $this->username = '';
        $this->password = '';
        $this->dbname = '';
    }

    public function connect(){

        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

        return $conn;
    }
    

}



