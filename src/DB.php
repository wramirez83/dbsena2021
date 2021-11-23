<?php

namespace Base;

use Config\App;

class DB{  

    protected $connect;
 
  public function __construct(){
    $app = new App();
    $this->connect = mysqli_connect($app->host,
    $app->dbUser, 
    $app->dbPassword, 
    $app->dbName);
    if(mysqli_connect_errno())
        echo "Error de Conexion";
  }

  public function query(string $table, string $field = '*'):array{
    $stringQuery = "SELECT $field FROM $table";
    $dataQuery = mysqli_query($this->connect, $stringQuery);
    $row = mysqli_fetch_all($dataQuery, MYSQLI_ASSOC);
    return $row;
  }
}
