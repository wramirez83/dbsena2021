<?php
namespace Base;

interface MotorDB {

    public function __construct();

    public function select(string $table, string $field = '*');

    public function where(array $filter, string $operator = 'AND');

    public function get();

    public function insert(string $table, array $fieldsAndValues);
}