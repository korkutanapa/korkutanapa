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
	background-image: url("taxii.jpeg");
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




</nav>



<article>


<h3>STANDART REPORTS  </h3>
<p>You can take the results of the reports from the list below<br>
Reports can be taken according to:<br>
* DAY OF THE WEEK ( please note that 1: SUNDAY 2: MONDAY .... 7: SATURDAY)<br>
* HOUR OF THE DAY<br>
* LOCATION<br>
* USERS<br>
* WEATHER TYPE<br>
* SATISFACTION TYPE<br>
* COMPLAINTS TYPE</p>

<form method="post" action="?action=report" enctype="multipart/form-data" >

	<h3>PLEASE ENTER THE DESIRED REPORT CRITERIA</h3><input list="reports" autocomplete="off" name="t_a" >
	<datalist id="reports">
    <option value="wed"> report according to DAY OF THE WEEK
    <option value="hp"> report according to HOUR OF THE DAY
    <option value="triplocationin"> report according to LOCATION
    <option value="username"> report according to USERS
    <option value="weather"> report according to WEATHER TYPE
	<option value="feedback"> report according to SATISFACTION TYPE
    <option value="complaint"> report according to COMPLAINTS TYPE
    </datalist><br>
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
    if($_GET['action'] == 'report')
    {
	$a=$_POST['t_a'];
    }
}

$sql = "SELECT $a as tr, AVG(star) AS th FROM trip GROUP BY $a ";
$stmt = sqlsrv_query($conn,$sql);


if(sqlsrv_has_rows($stmt))
{
	 if($a=="wed") {$aa="DAY OF THE WEEK";}
	 if($a=="hp") {$aa="HOUR OF THE DAY";}
	  if($a=="triplocationin") {$aa="LOCATION";}
	 if($a=="username") {$aa="USERS";}
	  if($a=="weather") {$aa="WEATHER TYPE";}
	 if($a=="feedback") {$aa="SATISFACTION TYPE";}
	  if($a=="complaint") {$aa="COMPLAINT TYPE";}
	
	 
	 
    print("<table border='1px'>");
    print("<tr><td>".$aa."</td>");
	print("<td>AVERAGE POINT</td></tr>");
    while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['tr']."</td>");
  		print("<td>".$row['th']."</td></tr>");
		
    }
    print("</table><br>");
};

$sqlA = "SELECT $a as tra, AVG(star) AS tha FROM trip GROUP BY $a ";
$stmtA = sqlsrv_query($conn,$sqlA);

$dataPoints=array();

if(sqlsrv_has_rows($stmtA))

{  while($rowa = sqlsrv_fetch_array($stmtA))
    {
    $GRAPH = array();
    $GRAPH['label'] = $rowa['tra'];
    $GRAPH['y'] = $rowa['tha'];
    array_push($dataPoints,$GRAPH);  
        
}};


	
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Graph of The Report"
	},
	
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## stars",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
	
	

});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>





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