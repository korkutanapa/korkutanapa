
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

<h3>TAXI DATABASE OF THE WORLD   </h3>
<?php

session_start();
echo "<h3>Hello</h3>  ".$_SESSION["username"]."  <h3>you are wellcome</h3> ";



?>

<h3> Please enter your evaluation about your taxi trip </h3>
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
	
	
	
	
	Date of Trip<br><input list="days" name="t_c" >
	<datalist id="days">
    <option value="Monday">
    <option value="Tuesday">
    <option value="wednesday">
    <option value="Thursday">
    <option value="Friday">
	<option value="Saturday">
    <option value="Sunday">
    </datalist></br>
	Time of Trip<br><input list="hours" name="t_d" >
	<datalist id="hours">
    <option value="00">
    <option value="01">
    <option value="02">
    <option value="03">
    <option value="04">
	<option value="05">
    <option value="06">
    <option value="07">
    <option value="08">
    <option value="09">
	<option value="10">
    <option value="11">
    <option value="12">
    <option value="13">
    <option value="14">
	<option value="15">
    <option value="16">
    <option value="17">
    <option value="18">
    <option value="19">
	<option value="20">
    <option value="21">
    <option value="22">
    <option value="23">
	</datalist></br>
	
	
	
	
	Location of Trip<br><input type="text" name="t_e" id="t_e"/></br>
	
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










</div>


<div class="alt-kutular">

<h3>TAXI DATABASE ( ONLY FOR DEVELOPMENT ISSUES )  </h3>


<form id="form1" name="form1" method="post" action="logout.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="logout" />
</p>
</form>

<form id="form1" name="form1" method="post" action="reports.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="Reports" />
</p>
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


/*Display registered people.*/
$sql = "SELECT * FROM trip ORDER BY taxiplate";
$stmt = sqlsrv_query($conn, $sql);
if($stmt === false)
{
    die(print_r(sqlsrv_errors(), true));
}
if(sqlsrv_has_rows($stmt))
{
    print("<table border='1px'>");
    print("<tr><td>Taxi Plate</td>");
    print("<td>Point</td>");
	print("<td>Date of Trip</td>");
	print("<td>Time of Trip</td>");
	print("<td>Location of Trip</td>");
	print("<td>Customer</td>");
	print("<td>Weather</td>");
	print("<td>Satisfaction</td>");
	print("<td>Complaint</td></tr>");
	
	
	
	
       
    while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['taxiplate']."</td>");
        print("<td>".$row['star']."</td>");
		print("<td>".$row['tripdate']."</td>");
		print("<td>".$row['triptime']."</td>");
		print("<td>".$row['triplocationin']."</td>");
		print("<td>".$row['username']."</td>");
		print("<td>".$row['weather']."</td>");
		print("<td>".$row['feedback']."</td>");
		print("<td>".$row['complaint']."</td></tr>");
		
		
				
    }
    print("</table>");
}


?>


</body>
</div>
</div>
</html>


