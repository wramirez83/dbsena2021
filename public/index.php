<?php

require_once('./../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable( __DIR__ . '/../');
$dotenv->load();



use Base\DB;

$db = new DB();

$data = $db->query('pb');
print_r($data);

