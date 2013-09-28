<?php

class Db {
    
    protected $connection;
    
    public function __construct() {
        $user = 'root';
        $pass = '';
        $dbname = 'cai';
        $dbhost = 'localhost';
        $dbtype = 'mysql';
        $this->connection = new PDO("$dbtype:host=$dbhost;dbname=$dbname", $user, $pass);
    }
    
    public function getConnection() {
        return $this->connection;
    }
    
}

