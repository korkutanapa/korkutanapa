
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/></head>

<style type="text/css">
#flex-kutu{
width:auto;
height:auto;
display:flex;
border:2px solid silver;
flex-direction:row;
background-color:#FFA500;
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
background-color:#D3D3D3;
background-repeat:no-repeat;

}

.alt-kutularana{
width:1500;
margin:30px;
padding:5px;
background-color:#D3D3D3;
background-image: url("ELLER11.jpg");
background-position:center;
background-repeat:no-repeat;
}

</style>

<body>


<div id ="flex-kutu">

<div class="alt-kutularana">

<h3>REPORTS </h3>
<h4>by BECKS </h4>

</div>


<div class="alt-kutular">
<h3>STANDART REPORTS  </h3>


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

$sql = "SELECT AVG(star) AS th FROM trip GROUP BY '$a'";
$stmt = sqlsrv_query($conn, $sql);
if($stmt === false)
{
    die(print_r(sqlsrv_errors(), true));
}
if(sqlsrv_has_rows($stmt))
{
  
    echo "Taxi plate  ". $a."  has a point  ";
       
    while($row = sqlsrv_fetch_array($stmt))
    {
			echo $row['$a'];
             echo $row['th'];
    }
  
}

?>




</body>
</div>
</div>
</html>