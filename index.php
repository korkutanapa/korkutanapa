<?php
	require_once('vendor/autoload.php');
	use BrightzoneGremlinDriverConnection;

	$db = new Connection([
    'host' => 'https://ratetaxicosmosdb.documents.azure.com.graphs.azure.com',
    'username' => '/dbs/ratetaxicosmosdb/colls/ratetaxicosmosdb',
    'password' => '6mpwHynjZvssEL8ejxI1CsA0eHn5uF2Z7YnZQdKRastGm5IvuNbLcLF4wwpZq2s8sDvMUg59RgR91RycsJjyHA=='
    ,'port' => '443'
    // Required parameter
    ,'ssl' => TRUE
	]);



    print "Welcome to Azure Cosmos DB + Gremlin on PHP!\n\n";
    print "Attempting to connect...\n";
			
    $db->open();
    print "Successfully connected to the database\n\n";
    
    $db->close();

?> 
 