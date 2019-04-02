<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial;
  font-size: 17px;
}

#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
}

.content {
  position: fixed;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
}

#myBtn {
  width: 200px;
  font-size: 18px;
  padding: 10px;
  border: none;
  background: #000;
  color: #fff;
  cursor: pointer;
}

#myBtn:hover {
  background: #ddd;
  color: black;
}
</style>
</head>
<body>

<video autoplay muted loop id="myVideo">
  <source src="BobB.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video>

<div class="content">
  <h1>RATE THE TAXI WEB APPLICATION by BECKS</h1>
  <p></p>
  <button id="myBtn" onclick="myFunction()">Pause</button>
  
  
  
  <form id="form1" name="form1" method="post" action="login_a.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="Login " />
</p>
</form>


<form id="form1" name="form1" method="post" action="registration.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="New User Registration " />
</p>
</form>
</div>


<h3>search a taxi  </h3>


<form method="post" action="?action=querytaxiplate" enctype="multipart/form-data" >
    Taxi Plate<br> <input type="text" name="t_a" id="t_a"/></br>
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
  
    echo "Taxi plate  ". $a."  has a point  ";
       
    while($row = sqlsrv_fetch_array($stmt))
    {
             echo $row['th'];
    }
  
}

?>


<script>
var video = document.getElementById("myVideo");
var btn = document.getElementById("myBtn");

function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause";
  } else {
    video.pause();
    btn.innerHTML = "Play";
  }
}
</script>

</body>
</html>