<?php
    $serverName = "tcp:reporttaxidbserver.database.windows.net,1433"; // update me
    $connectionOptions = array(
        "Database" => "ReportTaxiDB", // update me
        "Uid" => "becks@reporttaxidbserver", // update me
        "PWD" => "774761Ka." // update me
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    $tsql= "SELECT getdate() as tarih";
    $getResults= sqlsrv_query($conn, $tsql);
    echo ("Reading data from table" . PHP_EOL);
    if ($getResults == FALSE)
        echo (sqlsrv_errors());
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
     echo ($row['tarih'] . PHP_EOL);
    }
    sqlsrv_free_stmt($getResults);
?>