
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

<h3>REPORTS </h3>
<h4>by BECKS </h4>

<form id="form1" name="form1" method="post" action="logout.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="logout" />
</p>
</form>	

</div>


<div class="alt-kutular">
<h3>STANDART REPORTS  </h3>


<form id="form1" name="form1" method="post" action="graph.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="graph" />
</p>
</form>

<form method="post" action="?action=report" enctype="multipart/form-data" >

	 report criteria<br><input list="reports" name="t_a" >
	<datalist id="reports">
    <option value="tripdate"> report according to date
    <option value="triptime"> report according to time
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

print("The Selection is".$a."vay be");


$sql = "SELECT username , AVG(star) AS th FROM trip GROUP BY username";
$stmt = sqlsrv_query($conn, $sql);
if($stmt === false)
{
    die(print_r(sqlsrv_errors(), true));
}

if(sqlsrv_has_rows($stmt))
{
    print("<table border='1px'>");
    print("<tr><td>User Name</td>");
	print("<td>Average Point</td></tr>");
    while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['username']."</td>");
  		print("<td>".$row['th']."</td></tr>");
		
    }
    print("</table><br>");
}


$sql = "SELECT tripdate , AVG(star) AS th FROM trip GROUP BY tripdate";
$stmt = sqlsrv_query($conn, $sql);
if($stmt === false)
{
    die(print_r(sqlsrv_errors(), true));
}

if(sqlsrv_has_rows($stmt))
{
    print("<table border='1px'>");
    print("<tr><td>Day of Week</td>");
	print("<td>Average Point</td></tr>");
    while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['tripdate']."</td>");
  		print("<td>".$row['th']."</td></tr>");
    }
    print("</table><br>");
}

$sql = "SELECT triptime , AVG(star) AS th FROM trip GROUP BY triptime";
$stmt = sqlsrv_query($conn, $sql);
if($stmt === false)
{
    die(print_r(sqlsrv_errors(), true));
}

if(sqlsrv_has_rows($stmt))
{
    print("<table border='1px'>");
    print("<tr><td>Time of a Day</td>");
	print("<td>Average Point</td></tr>");
    while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['triptime']."</td>");
  		print("<td>".$row['th']."</td></tr>");
    }
    print("</table><br>");
}

$sql = "SELECT triplocationin , AVG(star) AS th FROM trip GROUP BY triplocationin";
$stmt = sqlsrv_query($conn, $sql);
if($stmt === false)
{
    die(print_r(sqlsrv_errors(), true));
}

if(sqlsrv_has_rows($stmt))
{
    print("<table border='1px'>");
    print("<tr><td>Location of Trip</td>");
	print("<td>Average Point</td></tr>");
    while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['triplocationin']."</td>");
  		print("<td>".$row['th']."</td></tr>");
    }
    print("</table><br>");
}

$sql = "SELECT weather , AVG(star) AS th FROM trip GROUP BY weather";
$stmt = sqlsrv_query($conn, $sql);
if($stmt === false)
{
    die(print_r(sqlsrv_errors(), true));
}

if(sqlsrv_has_rows($stmt))
{
    print("<table border='1px'>");
    print("<tr><td>wheather</td>");
	print("<td>Average Point</td></tr>");
    while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['weather']."</td>");
  		print("<td>".$row['th']."</td></tr>");
    }
    print("</table><br>");
}

$sql = "SELECT feedback , AVG(star) AS th FROM trip GROUP BY feedback";
$stmt = sqlsrv_query($conn, $sql);
if($stmt === false)
{
    die(print_r(sqlsrv_errors(), true));
}

if(sqlsrv_has_rows($stmt))
{
    print("<table border='1px'>");
    print("<tr><td>Satisfaction</td>");
	print("<td>Average Point</td></tr>");
    while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['feedback']."</td>");
  		print("<td>".$row['th']."</td></tr>");
    }
    print("</table><br>");
}

$sql = "SELECT complaint , AVG(star) AS th FROM trip GROUP BY complaint";
$stmt = sqlsrv_query($conn, $sql);
if($stmt === false)
{
    die(print_r(sqlsrv_errors(), true));
}

if(sqlsrv_has_rows($stmt))
{
    print("<table border='1px'>");
    print("<tr><td>Complaint</td>");
	print("<td>Average Point</td></tr>");
    while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['complaint']."</td>");
  		print("<td>".$row['th']."</td></tr>");
    }
    print("</table><br>");
}



	
?>


</body>
</div>
</div>
</html>