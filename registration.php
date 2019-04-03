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
<h4>REGISTRATION </h4>


<form id="form1" name="form1" method="post" action="index.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="Home Page " />
</p>
</form>
</div>

<div class="alt-kutular">
<h3>REGISTRATION INFO </h3>




<form method="post" action="?action=registration" enctype="multipart/form-data" >
    Username<br><input type="text" name="t_a" id="t_a"/></br>
    Password<br> <input type="password" name="t_b" id="t_b"/></br>
	Name Surname<br> <input type="text" name="t_c" id="t_c"/></br>
    Phone No<br><input type="text" name="t_d" id="t_d"/></br>
	Id No<br><input type="text" name="t_e" id="t_e"/></br>
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
    if($_GET['action'] == 'registration')
    {
        /*Insert data.*/
     $insertSql = "INSERT INTO [dbo].[users] ([username],[password],[name_surname],[phone_no],[id_no],[approve]) VALUES (?,?,?,?,?,'5')";
 
     $params = array(	&$_POST['t_a'],
						&$_POST['t_b'],
						&$_POST['t_c'],
						&$_POST['t_d'],
						&$_POST['t_e']
					);
					
        $stmt = sqlsrv_query($conn, $insertSql, $params);
        if($stmt === false)
        {
       
                echo "The username you entered has already been used.</br>";
          
        }
        else
        {
            echo "Registration complete.</br>";
			header('Location:index.php');
			
        }
    }
}


?>













