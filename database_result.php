<?php
/*Connect using SQL Server authentication.*/

$serverName = "tcp:mssmssdb.database.windows.net,1433";
$connectionOptions = array("Database"=>"mssdb",
                           "UID"=>"korkutanapa@mssmssdb",
                           "PWD" => "774761Ka.");
$conn = sqlsrv_connect($serverName, $connectionOptions);
if($conn === false)
{
    die(print_r(sqlsrv_errors(), true));
}


/*Display registered people.*/
$sql = "SELECT * FROM trip ORDER BY taxiplate";
$stmt = sqlsrv_query($conn, $sql);
if($stmt === false)
{
    die(print_r(sqlsrv_errors(), true));
}
if(sqlsrv_has_rows($stmt))
{
    print("<table border='1px'>");
    print("<tr><td>Taxi Plate</td>");
    print("<td>Point</td>");
	print("<td>Date of Trip</td>");
	print("<td>Time of Trip</td>");
	print("<td>Location of Trip</td>");
	print("<td>Customer</td>");
	print("<td>Weather</td>");
	print("<td>Satisfaction</td>");
	print("<td>Complaint</td></tr>");
	
	
	
	
       
    while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['taxiplate']."</td>");
        print("<td>".$row['star']."</td>");
		print("<td>".$row['tripdate']."</td>");
		print("<td>".$row['triptime']."</td>");
		print("<td>".$row['triplocationin']."</td>");
		print("<td>".$row['username']."</td>");
		print("<td>".$row['weather']."</td>");
		print("<td>".$row['feedback']."</td>");
		print("<td>".$row['complaint']."</td></tr>");
		
		
				
    }
    print("</table>");
}


?>