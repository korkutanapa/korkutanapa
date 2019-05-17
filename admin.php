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
  <p>HELLO MASTER</p>
</header>

			<section>
					<nav>

<form id="form1" name="form1" method="post" action="logout.php">

<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="logout" />
</p>
</form>	

</nav>


<article>
	

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
ENTER ID NO FOR REGISTRATION  <br><input type="text" name="t_a" autocomplete="off" id="t_a"/></br>
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
		
	
		
$sql = "UPDATE  [dbo].[users] SET approve='6' WHERE Id=('$a')";
$stmt = sqlsrv_query($conn, $sql);
if($stmt === false)
{
    die(print_r(sqlsrv_errors(), true));
}
else{  
    echo "Registration is approved ";
}}   }   



?>



<form method="post" action="?action=ignoreuser" enctype="multipart/form-data" >
ENTER ID NO FOR IGNORE  <br><input type="text" name="t_b" autocomplete="off" id="t_b"/></br>
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
		
	

$sql = "DELETE FROM  [dbo].[users] WHERE Id=('$b')";
$stmt = sqlsrv_query($conn, $sql);
if($stmt === false)
{
    die(print_r(sqlsrv_errors(), true));
}
else{  
    echo "Registration is rejected ";
}}  }    



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