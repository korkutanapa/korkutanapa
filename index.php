
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/></head>

<style type="text/css">
#flex-kutu{
width:auto;
height:auto;
display:flex;
border:2px solid silver;
flex-direction:row;
background-color:#ADADA8;
}


h1 {
font-size: 80px;
font-family: Times New Roman;
color: blue;
text-align:center;
}

p{
font-size: 20px;
font-family: verdana;
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
background-image: url("taxii.jpeg");
background-position:center;
background-repeat:no-repeat;
}

table {
  border-collapse: collapse;
  width: 100%;
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

<body>


<div id ="flex-kutu">

<div class="alt-kutularana">

<h3>REPORTAXI WEB APPLICATION </h3>
<h4>by BECKS </h4>


<form id="form1" name="form1" method="post" action="login_a.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="Login " />
</p>
</form>

<form id="form1" name="form1" method="post" action="abc.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="New Version " />
</p>
</form>


<form id="form1" name="form1" method="post" action="registration.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="New User Registration " />
</p>
</form>

</div>


<div class="alt-kutular">

<h3>TOP 3 BEST TAXI</h3>
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
$sql = "SELECT TOP 3 taxiplate as tr, AVG(star) AS th FROM trip GROUP BY taxiplate ORDER BY th DESC ";

$stmt = sqlsrv_query($conn,$sql);


if(sqlsrv_has_rows($stmt))
{
	 
    print("<table border='1px'>");
    print("<tr><td>".taxiplate."</td>");
	print("<td>Average Point</td></tr>");
    while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['tr']."</td>");
  		print("<td>".$row['th']."</td></tr>");
		
    }
    print("</table><br>");
};


?>

<form method="post" action="?action=querytaxiplate" enctype="multipart/form-data" >
    <h3>ENTER TAXI PLATE FOR SEARCH</h3><input type="text" autocomplete="off" name="t_a" id="t_a"/>
    <input type="submit" name="submit" value="Submit" /><br>
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
    if($_GET['action'] == 'querytaxiplate')
    {
	$a=$_POST['t_a'];
    }
}

$sql = "SELECT AVG(star) AS th FROM trip WHERE taxiplate='$a'";
$stmt = sqlsrv_query($conn, $sql);
if($stmt === false)
{
	die(print_r(sqlsrv_errors(), true));
}
if(sqlsrv_has_rows($stmt))
{
  
    echo " ";
       
    while($row = sqlsrv_fetch_array($stmt))
    {
            
			 if($row['th']==1) {echo"<p>Taxi plate  ". $a."  has a point ". $row['th']." POOR TAXI</p>";}
			 if($row['th']==2) {echo"<p>Taxi plate  ". $a."  has a point ". $row['th']." FAIR TAXI</p>";}
			 if($row['th']==3) {echo"<p>Taxi plate  ". $a."  has a point ". $row['th']." GOOD TAXI</p>";}
			 if($row['th']==4) {echo"<p>Taxi plate  ". $a."  has a point ". $row['th']." VERY GOOD TAXI</p>";}
			 if($row['th']==5) {echo"<p>Taxi plate  ". $a."  has a point ". $row['th']." EXCELLENT TAXI</p>";}
			 if($row['th']==0) {echo"<p> sorry no taxi with  ". $a ."  please enter a valid taxi plate  </p>";}
    }
  
}



?>





</body>
</div>
</div>
</html>


