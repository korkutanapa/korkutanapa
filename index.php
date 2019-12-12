<!DOCTYPE html>
<html lang="en">
<head>
<title>ALARM SENSOR KORKUT</title>
<meta charset="utf-8">
<meta name="keywords" content="IoT, sensor, alarm, Azure, cloud">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="60">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  background-color: #666;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
}

/* Container for flexboxes */
section {
  display: -webkit-flex;
  display: flex;
}

/* Style the navigation menu */
nav {
  -webkit-flex: 1;
  -ms-flex: 1;
  flex: 1;
  background: #ccc;
  padding: 20px;
	background-image: url("");
	background-position:center;
	background-repeat:no-repeat;

}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

/* Style the content */
article {
  -webkit-flex: 3;
  -ms-flex: 3;
  flex: 3;
  background-color: #f1f1f1;
  padding: 10px;
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}

/* Responsive layout - makes the menu and the content (inside the section) sit on top of each other instead of next to each other */
@media (max-width: 600px) {
  section {
    -webkit-flex-direction: column;
    flex-direction: column;
  }
}

/* For tables  */
table {
  border-collapse: collapse;
  width: 75%;
}

th, td {
  text-align: center;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}

</style>
</head>

<body>

<header>
 <h2>ALARM SENSOR</h2>
 <p>by Korkut</p>
</header>

<section>

<nav>



<h3>FAILURE ENTRY</h3>
<form method="post" action="?action=closedalarm" enctype="multipart/form-data" >
Please enter the failure indicator <br><input type="text" name="t_a" autocomplete="off" id="t_a"/></br>
<input type="text" name="t_b" autocomplete="off" id="t_b"/></br>
<input type="submit" name="submit" value="Close The Alarm" />
</form>


<?php
/*Connect using SQL Server authentication.*/

$serverName = "tcp:korkutse599server.database.windows.net,1433";
$connectionOptions = array("Database"=>"korkutse599db",
                           "UID"=>"korkut",
                           "PWD" => "774761Ka.");
$conn = sqlsrv_connect($serverName, $connectionOptions);

if($conn === false)
{
    die(print_r(sqlsrv_errors(), true));
}


if(isset($_GET['action']))
{
    if($_GET['action'] == 'closedalarm')
    {
		$a=$_POST['t_a'];
		$b=$_POST['t_b'];
	
		
$sql = "UPDATE  [dbo].[preses] SET completed='1' WHERE alarmno=('$a')";
$sql2="INSERT INTO [dbo].[closedalarms](alarmno,explanation) VALUES ('$a','$b')";
$stmt = sqlsrv_query($conn, $sql);
$stmt2 = sqlsrv_query($conn, $sql2);


if($stmt&$stmt2 === false)
{
    die(print_r(sqlsrv_errors(), true));
}
else{  
    echo "alarm is closed ";
}}   }   

?>
</form>
</nav>


<article>
<h3>PREVIOUS ALARMS</h3>

<form id="form1" name="form1" method="post" action="previousalarms.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="PREVIOUS ALARMS " />
</p>

<h3>CURRENT ALARMS ANOMALIES</h3>

<?php
/*Connect using SQL Server authentication.*/

$serverName = "tcp:korkutse599server.database.windows.net,1433";
$connectionOptions = array("Database"=>"korkutse599db",
                           "UID"=>"korkut",
                           "PWD" => "774761Ka.");
$conn = sqlsrv_connect($serverName, $connectionOptions);

if($conn === false)
{
    die(print_r(sqlsrv_errors(), true));
}
$sql = "SELECT alarmno AS no, deviceId AS Pres_Adress, temp AS Alarm_Temperature, alarmdate AS Time_of_Alarm FROM preses WHERE completed=0 and IsChangePointAnomaly=1 ORDER BY Time_of_Alarm DESC ";


$stmt = sqlsrv_query($conn,$sql);


if(sqlsrv_has_rows($stmt))
{
	 
    print("<table border='1px'>");
    print("<tr><td>Alarm No</td>");
	print("<td>Alarm Temperature</td>");
	print("<td>Pres Adres </td>");
	print("<td>Time of Alarm</td></tr>");
    while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['no']."</td>");
		print("<td>".$row['Alarm_Temperature']."</td>");
		print("<td>".$row['Pres_Adress']."</td>");
  		print("<td>".$row['Time_of_Alarm']."</td></tr>");
		
    }
    print("</table><br>");
};


?>

<h3>CURRENT ALARMS THRESHOLDS</h3>

<?php
/*Connect using SQL Server authentication.*/

$serverName = "tcp:korkutse599server.database.windows.net,1433";
$connectionOptions = array("Database"=>"korkutse599db",
                           "UID"=>"korkut",
                           "PWD" => "774761Ka.");
$conn = sqlsrv_connect($serverName, $connectionOptions);

if($conn === false)
{
    die(print_r(sqlsrv_errors(), true));
}
$sql = "SELECT alarmno AS no, deviceId AS Pres_Adress, T1 AS Alarm_Temperature,S1 AS AlarmTemperatureChange, alarmdate AS Time_of_Alarm FROM tresholdalarms ORDER BY Time_of_Alarm DESC ";


$stmt = sqlsrv_query($conn,$sql);


if(sqlsrv_has_rows($stmt))
{
	 
    print("<table border='1px'>");
    print("<tr><td>Alarm No</td>");
	print("<td>Alarm Temperature</td>");
	print("<td>Alarm Temperature Change </td>");
	print("<td>Pres Adres </td>");
	print("<td>Time of Alarm</td></tr>");
    while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['no']."</td>");
		print("<td>".$row['Alarm_Temperature']."</td>");
		print("<td>".$row['AlarmTemperatureChange']."</td>");
		print("<td>".$row['Pres_Adress']."</td>");
  		print("<td>".$row['Time_of_Alarm']."</td></tr>");
		
    }
    print("</table><br>");
};


?>


</article>
</section>
<footer>
  <div id="share-buttons">
     <!-- Email -->
    <a href="mailto:kanapa79@gmail.com">
        <img src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email" />
    </a>
</div>
</footer>

</body>

</html>


