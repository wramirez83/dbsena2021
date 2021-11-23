<?php

namespace Config;

class App{
    
    public $host, $dbUser, $dbPassword, $dbName;

    public function __construct(){
        //Set of var
        $this->host = $_ENV['DB_HOST'];
        $this->dbUser = $_ENV['DB_USER'];
        $this->dbPassword = $_ENV['DB_PASSWORD'];
        $this->dbName = $_ENV['DB_NAME'];
    }
}
