<?php

namespace Base;

use Config\App;
use mysqli;

class DBPOO implements MotorDB{

    protected $db;
    protected $stringQuery;
    protected $firstWhere = 0;

    public function __construct(){
        $app = new App();
        $this->db = new mysqli($app->host,
        $app->dbUser, 
        $app->dbPassword, 
        $app->dbName);
        $this->db->set_charset('utf8');//caracteres especiales
    }

    public function select(string $table, string $field = '*'){
        $this->stringQuery = "SELECT * FROM $table";
        return $this;
    }
    
    public function where(array $filter, string $operator = 'AND'){
        if($this->firstWhere == 0){
            $this->stringQuery .= " WHERE ";
            $this->stringQuery .= "  $filter[0] $filter[1] $filter[2]";
        }

        if($this->firstWhere > 0)
            $this->stringQuery .= " $operator $filter[0] $filter[1] $filter[2]";

        $this->firstWhere++;
        $this->stringQuery;

        return $this;
    }

    public function get(){
        $rows = $this->db->query($this->stringQuery);
        return $rows->fetch_all();
    }

    public function insert(string $table, array $fieldAndValue){
        $field = '';
        $values = '';
        foreach($fieldAndValue as $key => $value){
            $field .= $key . ', ';
            $values .= $value . ', ';
        }
        $field = substr($field, 0, strlen($field)-2);
        $values = substr($values, 0, strlen($values)-2);

        $stringQuery = "INSERT INTO $table ($field) VALUES ('$values')";

        $insert = $this->db->query($stringQuery);

        return $this->db->insert_id;
    }
}