<?php


$connectionInfo = array("UID" => "korkutanapa@mssmssdb", "pwd" => "774761Ka.", "Database" => "mssdb", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:mssmssdb.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);



if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}

if (!$conn->query("SET a=1")) {
    printf("Errormessage: %s\n", $conn->error);
}

if (mysqli_query($conn)) 
{
echo " bağlan da oldu bu iş";
}

else  

{echo "bağlan ad bağlanmadı";}

?>



