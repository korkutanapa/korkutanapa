
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



<form id="form1" name="form1" method="post" action="graph.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="Graph" />
</p>
</form>



</div>


<div class="alt-kutular">
<h3>STANDART REPORTS  </h3>
<h5> please note that: reports according to date means the weekdays. 1 for SUNDAY, 2 for MONDAY, ... , 7 for SATURDAY</h5>



<form method="post" action="?action=report" enctype="multipart/form-data" >

	 report criteria<br><input list="reports" name="t_a" >
	<datalist id="reports">
    <option value="wed"> report according to date
    <option value="hp"> report according to time
    <option value="triplocationin"> report according to location
    <option value="username"> report according to username
    <option value="weather"> report according to weather
	<option value="feedback"> report according to feedbacks
    <option value="complaint"> report according to complaints
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
    print("<table border='1px'>");
    print("<tr><td>".$a."</td>");
	print("<td>Average Point</td></tr>");
    while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['tr']."</td>");
  		print("<td>".$row['th']."</td></tr>");
		
    }
    print("</table><br>");
}

$dataPoints = array();

if(sqlsrv_has_rows($stmt))

{  while($row = sqlsrv_fetch_array($stmt))
    {
       $jsonArrayItem = array();
    $jsonArrayItem['x'] = $row['tr'];
    $jsonArrayItem['y'] = $row['th'];
    //append the above created object into the main array.
    array_push($dataPoints, $jsonArrayItem);   
        
		
}}


	
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
		text: "PHP Column Chart from Database"
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc  
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