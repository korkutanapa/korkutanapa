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
color:blue;
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
<h4>REGISTRATION </h4>
</div>

<div class="alt-kutular">
<h3>please register </h3>

<form id="form1" name="form1" method="post" action="index.php">
<p>
<input style="background-color:#D3D3D3;width:150px;height:20px;font-size:10pt;margin-left:0px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="back to home page " />
</p>
</form>


<form method="post" action="?action=registration" enctype="multipart/form-data" >
    Username<br><input type="text" name="t_a" id="t_a"/></br>
    Password<br> <input type="text" name="t_b" id="t_b"/></br>
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
			header('Location:index.php');
			
        }
    }
}


?>













