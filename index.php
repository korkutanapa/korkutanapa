
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
font-family: Comic Sans MS;
color: blue;
text-align:center;
}

p{
margin-left: 50px;
font-size: 30px;
font-family: comic sans ms;
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

<h3>RATE THE TAXI WEB APPLICATION </h3>
<h4>by BECKS </h4>

</div>


<div class="alt-kutular">
<h3>SEARCH FOR A TAXI POINT FROM THE UNIVERSAL DATA BASE OF THE APPLICATION  </h3>
<a href="anonymousrating.php"> GO TO ANONYMOUS RATING OF A TAXI  </a>

<form method="post" action="?action=querytaxiplate" enctype="multipart/form-data" >
    Taxi Plate <input type="text" name="t_a" id="t_a"/></br>
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
  
    echo "Taxi plate". $a."has a point";
       
    while($row = sqlsrv_fetch_array($stmt))
    {
             echo $row['th'];
    }
  
}

?>




</body>
</div>
</div>
</html>


