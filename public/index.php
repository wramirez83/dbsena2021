<?php

require_once('./../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable( __DIR__ . '/../');
$dotenv->load();

use Base\DB;
use Base\DBPOO;

$db = new DBPOO();
echo $db->insert('pb', [
    'msg' => 'Ahora estamos insertando porque si'
]);


