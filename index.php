<?php
require_once('vendor/autoload.php');
use \Brightzone\GremlinDriver\Connection;
error_reporting(E_ALL ^ E_WARNING);

$db = new Connection([
    'host' => 'https://ratetaxicosmosdb.documents.azure.com.graphs.azure.com',
    'username' => '/dbs/ratetaxicosmosdb/colls/ratetaxicosmosdb',
    'password' => '6mpwHynjZvssEL8ejxI1CsA0eHn5uF2Z7YnZQdKRastGm5IvuNbLcLF4wwpZq2s8sDvMUg59RgR91RycsJjyHA=='
    ,'port' => '443'
    // Required parameter
    ,'ssl' => TRUE
]);
			
    $db->open();
    
    $db->close();

?> 
 