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
font-family: Times New roman;
color: blue;
text-align:center;
}

p{
margin-left: 20px;
font-size: 30px;
font-family: Times New roman;
color: black;
}
ppp{
margin-left: 2px;
font-size: 20px;
font-family: Times New roman;
color: black;
}

.alt-kutular{
width:1500;
margin:15px;
padding:5px;
background-color:#D3D3D3;
background-repeat:no-repeat;

}
.alt-kutularana{
width:3000;
margin:15px;
padding:5px;
background-color:#D3D3D3;
background-image: url("iconel.jpg");
background-position:lrft;
background-repeat:no-repeat;
}
.alt-kutularana2{
width:3000;
margin:15px;
padding:5px;
background-color:#D3D3D3;
background-position:lrft;
background-repeat:no-repeat;
}

</style>


<body>
<div id ="flex-kutu">
		
		
<div class="alt-kutularana">
<p style="margin-left:150px;"> HELLO MASTER 
<form id="form1" name="form1" method="post" action="logout.php">
<p>
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

<form id="form1" name="form1" method="post" action="userregistration.php">
<p>REGISTER USER</p>
<p>
<label> 
<input type="text" name="oindexkisiler" id="oindexkisiler"  />
<input type="submit" name="submit" value="Submit" />
</label>
</p>
<p>


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
        /*Insert data.*/
		
	"UPDATE dna.kisiler SET onay= '1' WHERE indexkisiler=('$cekoindexkisiler')";	
     $insertSql = "UPDATE  [dbo].[user] SET approve='6' WHERE Id=('$_POST['t_a']')";
     $stmt = sqlsrv_query($conn, $insertSql);
        if($stmt === false)
        {
            /*Handle the case of a duplicte e-mail address.*/
            $errors = sqlsrv_errors();
            if($errors[0]['code'] == 2601)
            {
                echo "The e-mail address you entered has already been used.</br>";
            }
            /*Die if other errors occurred.*/
            else
            {
                die(print_r($errors, true));
            }
        }
        else
        {
            echo "Registration complete.</br>";
		
        }
    }
}


?>


