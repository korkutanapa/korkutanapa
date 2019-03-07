
<?php

try {
    $conn = new PDO("sqlsrv:server = tcp:reporttaxidbserver.database.windows.net,1433; Database = ReportTaxiDB", "becks", "774761Ka.");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

$connectionInfo = array("UID" => "becks@reporttaxidbserver", "pwd" => "774761Ka.", "Database" => "ReportTaxiDB", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:reporttaxidbserver.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?> 