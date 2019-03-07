<?php
//Data Source=tcp:mssmssdb.database.windows.net,1433;Initial Catalog=mssdb;User Id=korkutanapa@mssmssdb.database.windows.net;Password=774761Ka.;

$connectionInfo = array("UID" => "korkutanapa@mssmssdb", "pwd" => "774761Ka.", "Database" => "mssdb", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:mssmssdb.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

?>



