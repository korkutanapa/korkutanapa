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
color:blue;
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
<h4>LOGIN </h4>
</div>

<div class="alt-kutular">


<form method="post" action="?action=login" enctype="multipart/form-data" >
    Username<input type="text" name="t_a" id="t_a"/></br>
    Password <input type="text" name="t_b" id="t_b"/></br>
	
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
    if($_GET['action'] == 'login')
    {
       

			session_start();
			$kadi=$_POST["t_a"];
			$sifre=$_POST["t_b"];




		$sql = "SELECT * FROM [dbo].[users]WHERE (password='$sifre' and username='$kadi' and onay='0')";
		if ($result=mysqli_query($conn,$sql))
		
				{$count=mysqli_num_rows($result);

						if ($count==1){
						$_SESSION["username"] = $kadi;
						switch ($kadi)  {
						case "admin":
						header('Location:DATABASE.php');
					
						break;
						default:
						header('Location:DATABASE.php');
										}
						
			
						}else {
				echo " something went wrong <a href=index.php> please enter </a>" ;
				}
		
				}
		
				else {
				echo " something went wrong <a href=index.php> please enter </a>" ;
				}
	
		
mysqli_close($conn);
	
?>	


</body>
</div>
</div>
</html>














