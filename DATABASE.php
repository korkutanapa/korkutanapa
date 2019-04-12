
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
<h4>TAXI EVALUATION </h4>

<form id="form1" name="form1" method="post" action="logout.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="Logout" />
</p>
</form>

<form id="form1" name="form1" method="post" action="reports.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="Reports" />
</p>
</form>

<form id="form1" name="form1" method="post" action="database_result.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="Database" />
</p>
</form>


</div>


<div class="alt-kutular">

<h3>TAXI EVALUATION  </h3>
<?php

session_start();
echo "<h3>Hello</h3>  ".$_SESSION["username"]."  <h3>you are wellcome</h3> ";



?>

<h3> Please enter your evaluation about your taxi trip </h3>

<?php
$ip = $_SERVER['REMOTE_ADDR']; 
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if($query && $query['status'] == 'success') 
{$location=$query['district'];
$locationb=$query['city'];

echo 'Location is:'.$location.'  '.$locationb.' ';
}
?>

<form method="post" action="?action=add" enctype="multipart/form-data" >
    Taxi Plate <br><input type="text" name="t_a" id="t_a"/></br>

	Point or stars<br><input list="stars" name="t_b" >
	<datalist id="stars">
    <option value="1"> poor
    <option value="2"> fair
    <option value="3"> good
    <option value="4"> very good
    <option value="5"> excellent
    </datalist></br>
	
	
	Date & Time of Trip<br><input type="datetime-local" name="t_c"><br>
	


	

	
	
	<br>Location of Trip<br><input type="text" name="t_e" id="t_e"/></br>
	
	Weather<br><input list="weather" name="t_g" >
	<datalist id="weather">
    <option value="Sunny">
    <option value="Rainy">
    <option value="Snowy">
    </datalist></br>


	

	
	Satisfaction<br><input list="feedback" name="t_h" >
	<datalist id="feedback">
    <option value="Good driver"> 
    <option value="Obeys the traffic rules"> 
    <option value="Very polite"> 
    <option value="Assists with the baggage">
    </datalist></br>
	
	
	
	
	Complaint<br><input list="complaint" name="t_i" >
	<datalist id="complaint">
    <option value="Uses cigarette"> 
    <option value="Bad smell"> 
    <option value="Foul language"> 
    <option value="Violation of the traffic rules">
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
    if($_GET['action'] == 'add')
    {
        /*Insert data.*/
	 $aa=$_POST['t_c'];
	 $a="DATEPART(dw,$aa)";
	 $b="DATEPART(hh,$aa)";
	 $aaa = sqlsrv_query($conn,$a);
	 $bbb=  sqlsrv_query($conn,$b);
     $insertSql = "INSERT INTO [dbo].[trip] ([taxiplate],[star],[triplocationin],[username],[weather],[feedback],[complaint],[tripdate],[triptime]) VALUES (?,?,?,?,?,?,?,$aaa,$bbb";
     $params = array(	&$_POST['t_a'],
                        &$_POST['t_b'],
						&$_POST['t_e'],
                        &$_SESSION["username"],
						&$_POST['t_g'],
                        &$_POST['t_h'],
						&$_POST['t_i']
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
		
        }
    }
}

	



?>

</body>
</div>
</div>
</html>


