<?php


$connectionInfo = array("UID" => "korkutanapa@mssmssdb", "pwd" => "774761Ka.", "Database" => "mssdb", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:mssmssdb.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
if (mysqli_query($conn)) 
{
echo " bağlan da oldu bu iş";
}

else  

{echo "bağlan ad bağlanmadı";}

?>



