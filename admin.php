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
background-image: url("taxii.jpeg");
background-position:center;
background-repeat:no-repeat;
}

</style>


<body>
<div id ="flex-kutu">
		
		
<div class="alt-kutularana">
<p style="margin-left:150px;"> HELLO MASTER
<form id="form1" name="form1" method="post" action="logout.php">

<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="logout" />
</p>
</form>	
</div>
</div>


<div id ="flex-kutu">
<div class="alt-kutular">
	

<p>APPROVE REGISTER </p>


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

 
$sql = "SELECT * FROM users WHERE approve='5'";
$stmt = sqlsrv_query($conn, $sql);
if($stmt === false)
{
    die(print_r(sqlsrv_errors(), true));
}
if(sqlsrv_has_rows($stmt))
{
    print("<table border='1px'>");
    print("<td>ID</td>");
	print("<td>USER NAME</td>");
	print("<td>NAME SURNAME</td>");
	print("<td>TEL NO</td></tr>");
		
       
    while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['Id']."</td>");
        print("<td>".$row['username']."</td>");
		print("<td>".$row['name_surname']."</td>");
		print("<td>".$row['phone_no']."</td></tr>");

		
				
    }
    print("</table>");
}
?>



<form method="post" action="?action=registeruser" enctype="multipart/form-data" >
ENTER ID NO FOR REGISTRATION  <br><input type="text" name="t_a" id="t_a"/></br>
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
    if($_GET['action'] == 'registeruser')
    {
		$a=$_POST['t_a'];
		
	}
		
$sql = "UPDATE  [dbo].[users] SET approve='6' WHERE Id=('$a')";
$stmt = sqlsrv_query($conn, $sql);
if($stmt === false)
{
    die(print_r(sqlsrv_errors(), true));
}
else{  
    echo "registered ";
}}      



?>



<form method="post" action="?action=ignoreuser" enctype="multipart/form-data" >
ENTER ID NO FOR IGNORE  <br><input type="text" name="t_b" id="t_b"/></br>
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
    if($_GET['action'] == 'ignoreuser')
    {
		$b=$_POST['t_b'];
		
	}

$sql = "DELETE FROM  [dbo].[users] WHERE Id=('$b')";
$stmt = sqlsrv_query($conn, $sql);
if($stmt === false)
{
    die(print_r(sqlsrv_errors(), true));
}
else{  
    echo "registered ";
}}      



?>
</div>
</div>
</body>

</html>
