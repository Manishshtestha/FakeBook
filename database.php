<?php
class Database{
    protected $connection;
    public function __construct(){
        $host = "localhost"; // Host name
        $username = "root"; 	// Mysql username
        $password = '';   // Mysql password
        $database = 'fakebook'; //Mysql Database
        $this->connection = new mysqli($host,$username,$password,$database);
        if($this->connection->connect_error){
            die("Connection failed: ".$this->connection->connect_error);
        }
    }
}
?>