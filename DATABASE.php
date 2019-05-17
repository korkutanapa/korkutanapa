<!DOCTYPE html>
<html lang="en">
<head>
<title>REPORTAXI</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  background-color: #666;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
}

/* Container for flexboxes */
section {
  display: -webkit-flex;
  display: flex;
}

/* Style the navigation menu */
nav {
  -webkit-flex: 1;
  -ms-flex: 1;
  flex: 1;
  background: #ccc;
  padding: 20px;
	background-image: url("");
	background-position:center;
	background-repeat:no-repeat;

}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

/* Style the content */
article {
  -webkit-flex: 3;
  -ms-flex: 3;
  flex: 3;
  background-color: #f1f1f1;
  padding: 10px;
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}

/* Responsive layout - makes the menu and the content (inside the section) sit on top of each other instead of next to each other */
@media (max-width: 600px) {
  section {
    -webkit-flex-direction: column;
    flex-direction: column;
  }
}

/* For tables  */
table {
  border-collapse: collapse;
  width: 75%;
}

th, td {
  text-align: center;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}

</style>
</head>


<body>

<header>
 <h2>REPORTAXI WEB APPLICATION</h2>
 <p>by BECKS</p>
</header>

			<section>
					<nav>

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

</nav>

<article>

<h3>TAXI EVALUATION  </h3>
<?php

session_start();
echo "<p>Hello  ".$_SESSION["username"]." you are wellcome</p> ";



?>

<p> Please enter your evaluation about your taxi trip </p>

<form method="post" action="?action=add" enctype="multipart/form-data" >
    Taxi Plate (format must be 11T1111)<br><input type="text" autocomplete="off" pattern="[0-9]{2}[A-Z]{1}[0-9]{4}" name="t_a" id="t_a"/></br>

	Point or stars<br><input list="stars" autocomplete="off" name="t_b" >
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
	
	Weather<br><input list="weather" autocomplete="off"  name="t_g" >
	<datalist id="weather">
    <option value="Sunny">
    <option value="Rainy">
    <option value="Snowy">
    </datalist></br>
	
	Satisfaction<br><input list="feedback" autocomplete="off" required="required" name="t_h">
	<datalist id="feedback">
	<option value="None">
    <option value="Good driver"> 
    <option value="Obeys the traffic rules"> 
    <option value="Very polite"> 
    <option value="Assists with the baggage">
    </datalist></br>
		
	Complaint<br><input list="complaint" autocomplete="off" required="required" name="t_i">
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
</article>
			</section>

<footer>
  <div id="share-buttons">
    

    

    
    <!-- Email -->
    <a href="mailto:kanapa79@gmail.com">
        <img src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email" />
    </a>
 
    <!-- Facebook -->
    <a href="http://www.facebook.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
    </a>
    
    <!-- Google+ -->
    <a href="https://plus.google.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
    </a>
    
    <!-- LinkedIn -->
    <a href="http://www.linkedin.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/linkedin.png" alt="LinkedIn" />
    </a>
    
        
    <!-- Print -->
    <a href="javascript:;" onclick="window.print()">
        <img src="https://simplesharebuttons.com/images/somacro/print.png" alt="Print" />
    </a>
    

    
    <!-- Tumblr-->
    <a href="http://www.tumblr.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/tumblr.png" alt="Tumblr" />
    </a>
     
    <!-- Twitter -->
    <a href="https://twitter.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
    </a>

	</div>
</footer>

</body>
</html>
