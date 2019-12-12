<!DOCTYPE html>
<html lang="en">
<head>
<title>ALARM SENSOR KORKUT</title>
<meta charset="utf-8">
<meta name="keywords" content="IoT, sensor, alarm, Azure, cloud">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<form id="form1" name="form1" method="post" action="index.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="ALARMS " />
</p>
</form>
</nav>


<article>

<h3>CLOSED ALARMS</h3>
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
$sql = "SELECT alarmno AS no, explanation AS exp, deviceId AS Id , alarmdate AS time FROM closedalarms ORDER BY no DESC ";


$stmt = sqlsrv_query($conn,$sql);


if(sqlsrv_has_rows($stmt))
{
	 
    print("<table border='1px'>");
    print("<tr><td>Alarm No</td>");
	print("<td>Explanation</td>");
	print("<td>Device</td>");
	print("<td>Time</td></tr>");
    while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['no']."</td>");
		  print("<td>".$row['exp']."</td>");
		    print("<td>".$row['Id']."</td>");
  		print("<td>".$row['time']."</td></tr>");

		
    }
    print("</table><br>");
};


?>

<h3>DATA GRAPH FOR DEVICE </h3>
<form method="post" action="?action=deviceid" enctype="multipart/form-data" >
Please enter the device id  <br><input type="text" name="t_aa" autocomplete="off" id="t_aa"/></br>
<input type="submit" name="submit" value="graph" />
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
    if($_GET['action'] == 'deviceid')
    {
		$a=$_POST['t_aa'];


$sqlA = "SELECT temp as temp, alarmdate as alarmdate FROM preses WHERE deviceId='$a' ";
$stmtA = sqlsrv_query($conn,$sqlA);

$dataPoints=array();

if(sqlsrv_has_rows($stmtA))

{  while($rowa = sqlsrv_fetch_array($stmtA))
    {
    $GRAPH = array();
    $GRAPH['label'] = $rowa['alarmdate'];
    $GRAPH['y'] = $rowa['temp'];
    array_push($dataPoints,$GRAPH);  
        
}}}};


	
?>

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
    if($_GET['action'] == 'deviceid')
    {
		$a=$_POST['t_aa'];


$sqlB = "SELECT closedv as closedv, alarmdate as alarmdate FROM closedalarms WHERE deviceId='$a' ";
$stmtB = sqlsrv_query($conn,$sqlB);

$dataPoints2=array();

if(sqlsrv_has_rows($stmtB))

{  while($rowb = sqlsrv_fetch_array($stmtB))
    {
    $GRAPH1 = array();
    $GRAPH1['label'] = $rowb['alarmdate'];
    $GRAPH1['y'] = $rowb['closedv'];
    array_push($dataPoints2,$GRAPH1);  
        
}}}};


	
?>




<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "DATA GRAPH"
	},
	axisY: {
		title: "data"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}

</script>


</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>   


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
</html>