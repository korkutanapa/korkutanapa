
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

font-size: 15px;
font-family: Verdana;
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




</div>


<div class="alt-kutular">

<h3>TAXI EVALUATION  </h3>
<?php

session_start();
echo "<p>Hello  ".$_SESSION["username"]." you are wellcome</p> ";



?>

<p> Please enter your evaluation about your taxi trip </p>

<form method="post" action="?action=add" enctype="multipart/form-data" >
    Taxi Plate (format must be 11T1111)<br><input type="text" autocomplete="off" pattern="[0-9]{2}[A-Z]{1}[0-9]{4}" name="t_a" id="t_a"/></br>

	Point or stars<br><input list="stars" name="t_b" >
	<datalist id="stars">
    <option value="1"> poor
    <option value="2"> fair
    <option value="3"> good
    <option value="4"> very good
    <option value="5"> excellent
    </datalist></br>
	
	
	Date of Trip<br><input type="date" name="t_c"><br>
	Time of Trip<br><input type="time" name="t_d"><br>

	Location of Trip<br><input type="text" name="t_e" autocomplete="off" id="t_e"/></br>
	
	Weather<br><input list="weather" name="t_g" >
	<datalist id="weather">
    <option value="Sunny">
    <option value="Rainy">
    <option value="Snowy">
    </datalist></br>
	
	Satisfaction<br><input list="feedback" required="required" name="t_h">
	<datalist id="feedback">
	<option value="None">
    <option value="Good driver"> 
    <option value="Obeys the traffic rules"> 
    <option value="Very polite"> 
    <option value="Assists with the baggage">
    </datalist></br>
		
	Complaint<br><input list="complaint" required="required" name="t_i">
	<datalist id="complaint">
	<option value="None"> 
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
     $insertSql = "INSERT INTO [dbo].[trip] ([taxiplate],[star],[tripdate],[triptime],[triplocationin],[username],[weather],[feedback],[complaint]) VALUES (?,?,?,?,?,?,?,?,?)";
     $params = array(	&$_POST['t_a'],
                        &$_POST['t_b'],
						&$_POST['t_c'],
						&$_POST['t_d'],
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


