
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/></head>

<style type="text/css">
#flex-kutu{
width:auto;
height:auto;
display:flex;
border:2px solid silver;
flex-direction:row;
background-color:#FFF600;
}


h1 {
font-size: 80px;
font-family: Times New Roman;
color: blue;
text-align:center;
}

p{
margin-left: 50px;
font-size: 30px;
font-family: Times New Roman;
color: black;
}
.alt-kutular{
width:1500;
margin:30px;
padding:5px;
background-color:#F7F7F7;
background-repeat:no-repeat;

}

.alt-kutularana{
width:1500;
margin:30px;
padding:5px;
background-color:#F7F7F7;
background-image: url("taxi.jpeg");
background-position:center;
background-repeat:no-repeat;
}

</style>

<body>


<div id ="flex-kutu">

<div class="alt-kutularana">
<h3>REPORTAXI WEB APPLICATION </h3>
<h4>REPORTS </h4>

<form id="form1" name="form1" method="post" action="logout.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="Logout" />
</p>
</form>	




</div>


<div class="alt-kutular">
<h3>STANDART REPORTS  </h3>
<h5> This page is for REPORTS</h5>
<h5> You can take the results of the reports from the list below</h5>
<h5> Reports can be taken according to:</h5>
<h5>DAY OF THE WEEK ( please note that 1: SUNDAY 2: MONDAY .... 7: SATURDAY)</h5>
<h5>HOUR OF THE DAY</h5>
<h5>LOCATION</h5>
<h5>USERS</h5>
<h5>WEATHER TYPE</h5>
<h5>SATISFACTION TYPE</h5>
<h5>COMPLAINTS TYPE</h5>

<form method="post" action="?action=report" enctype="multipart/form-data" >

	 report criteria<br><input list="reports" name="t_a" >
	<datalist id="reports">
    <option value="wed"> report according to DAY OF THE WEEK
    <option value="hp"> report according to HOUR OF THE DAY
    <option value="triplocationin"> report according to LOCATION
    <option value="username"> report according to USERS
    <option value="weather"> report according to WEATHER TYPE
	<option value="feedback"> report according to SATISFACTION TYPE
    <option value="complaint"> report according to COMPLAINTS TYPE
    </datalist></br>
    <input type="submit" name="submit" value="Submit" />
</form>

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

if(isset($_GET['action']))
{
    if($_GET['action'] == 'report')
    {
	$a=$_POST['t_a'];
    }
}

$sql = "SELECT $a as tr, AVG(star) AS th FROM trip GROUP BY $a ";
$stmt = sqlsrv_query($conn,$sql);


if(sqlsrv_has_rows($stmt))
{
	 if($a=="wed") {$aa="day of the week";}
	 if($a=="hp") {$aa="hour of the day";}
	  if($a=="triplocationin") {$aa="location";}
	 if($a=="username") {$aa="users";}
	  if($a=="weather") {$aa="weather type";}
	 if($a=="feedback") {$aa="satisfaction type";}
	  if($a=="complaint") {$aa="complaint type";}
	
	 
	 
    print("<table border='1px'>");
    print("<tr><td>".$aa."</td>");
	print("<td>Average Point</td></tr>");
    while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['tr']."</td>");
  		print("<td>".$row['th']."</td></tr>");
		
    }
    print("</table><br>");
};

$sqlA = "SELECT $a as tra, AVG(star) AS tha FROM trip GROUP BY $a ";
$stmtA = sqlsrv_query($conn,$sqlA);

$dataPoints=array();

if(sqlsrv_has_rows($stmtA))

{  while($rowa = sqlsrv_fetch_array($stmtA))
    {
    $GRAPH = array();
    $GRAPH['label'] = $rowa['tra'];
    $GRAPH['y'] = $rowa['tha'];
    array_push($dataPoints,$GRAPH);  
        
}};


	
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Graph of The Report"
	},
	
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## stars",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
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