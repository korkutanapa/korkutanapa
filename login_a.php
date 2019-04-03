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
<h4>LOGIN </h4>

<form id="form1" name="form1" method="post" action="index.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="Home Page " />
</p>
</form>

</div>

<div class="alt-kutular">
<h3>LOGIN THE SYSTEM</h3>

<form method="post" action="?action=login" enctype="multipart/form-data" >
    <h3>Username</h3><input type="text" name="t_a" id="t_a"/>
    <h3>Password</h3><input type="password" name="t_b" id="t_b"/>
	
    <input type="submit" name="submit" value="Submit" />
</form>


<?php


if(isset($_GET['action']))
{
    if($_GET['action'] == 'login')
    {
       
	   
		$serverName = "tcp:mssmssdb.database.windows.net,1433";
		$connectionOptions = array("Database"=>"mssdb",
                           "UID"=>"korkutanapa@mssmssdb",
                           "PWD" => "774761Ka.");
		$conn = sqlsrv_connect($serverName, $connectionOptions);
		if($conn === false)
		{
		die(print_r(sqlsrv_errors(), true));
		}
	   
	   	session_start();
		$kadi=$_POST["t_a"];
		$sifre=$_POST["t_b"];

		echo $kadi;
		echo $sifre;

		$sql = "SELECT AVG(approve) AS th FROM users WHERE(password='$sifre' and username='$kadi')";
		$stmt = sqlsrv_query($conn, $sql);
		if($stmt === false)
		{
		die(print_r(sqlsrv_errors(), true));
		}

		$row = sqlsrv_fetch_array($stmt);
		if($row['th']==6)
		{
  
		
		
						$_SESSION["username"] = $kadi;
						switch ($kadi)  {
						case "admin":
						header('Location:admin.php');
					
						break;
						default:
						header('Location:DATABASE.php');
		
						echo "Taxi plate". $a."has a point";
						
		}}
		else {
				echo " something went wrong <a href=index.php> please enter </a>" ;
				}
		
				}
       
		
				mysqli_close($conn);
}
?>	


</body>
</div>
</div>
</html>














