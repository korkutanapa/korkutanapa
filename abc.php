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
  background-size: auto;
  background-position:center;
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
</style>
</head>
<body>

<header>
 <h2>REPORTAXI WEB APPLICATION</h2>
 <p>by BECKS</p>
</header>

<section>
  <nav>

<form id="form1" name="form1" method="post" action="login_a.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;" type="submit" name="Submit" id="button" value="Login " />
</p>
</form>


<form id="form1" name="form1" method="post" action="registration.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;" type="submit" name="Submit" id="button" value="New User Registration " />
</p>
</form>
  </nav>
  
  <article>
    <h3>TOP 3 BEST TAXI</h3>
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
$sql = "SELECT TOP 3 taxiplate as tr, AVG(star) AS th FROM trip GROUP BY taxiplate ORDER BY th DESC ";

$stmt = sqlsrv_query($conn,$sql);


if(sqlsrv_has_rows($stmt))
{
	 
    print("<table border='1px'>");
    print("<tr><td>".taxiplate."</td>");
	print("<td>Average Point</td></tr>");
    while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['tr']."</td>");
  		print("<td>".$row['th']."</td></tr>");
		
    }
    print("</table><br>");
};


?>

<form method="post" action="?action=querytaxiplate" enctype="multipart/form-data" >
    <h3>ENTER TAXI PLATE FOR SEARCH</h3><input type="text" name="t_a" id="t_a"/>
    <input type="submit" name="submit" value="Submit" /><br>
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
    if($_GET['action'] == 'querytaxiplate')
    {
	$a=$_POST['t_a'];
    }
}

$sql = "SELECT AVG(star) AS th FROM trip WHERE taxiplate='$a'";
$stmt = sqlsrv_query($conn, $sql);
if($stmt === false)
{
	die(print_r(sqlsrv_errors(), true));
}
if(sqlsrv_has_rows($stmt))
{
  
    echo " ";
       
    while($row = sqlsrv_fetch_array($stmt))
    {
            
			 if($row['th']==1) {echo"<p>Taxi plate  ". $a."  has a point ". $row['th']." POOR TAXI</p>";}
			 if($row['th']==2) {echo"<p>Taxi plate  ". $a."  has a point ". $row['th']." FAIR TAXI</p>";}
			 if($row['th']==3) {echo"<p>Taxi plate  ". $a."  has a point ". $row['th']." GOOD TAXI</p>";}
			 if($row['th']==4) {echo"<p>Taxi plate  ". $a."  has a point ". $row['th']." VERY GOOD TAXI</p>";}
			 if($row['th']==5) {echo"<p>Taxi plate  ". $a."  has a point ". $row['th']." EXCELLENT TAXI</p>";}
			 if($row['th']==0) {echo"<p> sorry no taxi like that, please enter a valid taxi plate  </p>";}
    }
  
}



?>

	
  </article>
</section>

<footer>
  <div id="share-buttons">
    
    <!-- Buffer -->
    <a href="https://bufferapp.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/buffer.png" alt="Buffer" />
    </a>
    
    <!-- Digg -->
    <a href="http://www.digg.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/diggit.png" alt="Digg" />
    </a>
    
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
    
    <!-- Reddit -->
    <a href="http://reddit.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/reddit.png" alt="Reddit" />
    </a>
    
    <!-- StumbleUpon-->
    <a href="http://www.stumbleupon.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/stumbleupon.png" alt="StumbleUpon" />
    </a>
    
    <!-- Tumblr-->
    <a href="http://www.tumblr.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/tumblr.png" alt="Tumblr" />
    </a>
     
    <!-- Twitter -->
    <a href="https://twitter.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
    </a>
    
    <!-- VK -->
    <a href="http://vkontakte.ru" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/vk.png" alt="VK" />
    </a>
    
    <!-- Yummly -->
    <a href="http://www.yummly.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/yummly.png" alt="Yummly" />
    </a>
	</div>
</footer>

</body>
</html>