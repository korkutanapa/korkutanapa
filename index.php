<!DOCTYPE html>
<html lang="en">
<head>
<title>BULAŞIK MAKİNASI İŞLETMESİ KARANTİNA VERİ TABANI</title>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="60">
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
</head>

</style>

<body>

<header>
 <h2>BULAŞIK MAKİNASI İŞLETMESİ KARANTİNA VERİ TABANI</h2>
 <p>by N-deck</p>
</header>

<section>

<nav>



<h3>SICIL GIRISI</h3>
<form method="post" action="?action=closedanamoly" enctype="multipart/form-data" >
SICIL GIRINIZ <br><input type="text" name="t_a" autocomplete="off" id="t_a"/></br>
<input type="submit" name="submit" value="KARANTINA LISTESI TARA" />
</form>


<?php

$connectionInfo = array("UID" => "korkut", "pwd" => "774761Ka.", "Database" => "korkutse599db", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:korkutse599server.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);


if(isset($_GET['action']))
{
    if($_GET['action'] == 'closedanamoly')
    {
		/*$a=$_POST['t_a'];*/
		
	$a=600780;
		
$sql = "select sicil as karantina
from dbo.corona 
where 
yemekhane IN ( select yemekhane from  dbo.corona where sicil='$a') 
or 
mola IN ( select mola from  dbo.corona where sicil='$a') 
or
vardiya IN ( select vardiya from  dbo.corona where sicil='$a')
or
servis IN ( select servis from  dbo.corona where sicil='$a')
or
ekip IN ( select ekip from  dbo.corona where sicil='$a')
or
istasyon IN ( select istasyon+1 from  dbo.corona where sicil='$a')
or
istasyon IN ( select istasyon-1 from  dbo.corona where sicil='$a')";
		
		



$stmt = sqlsrv_query($conn,$sql);


if(sqlsrv_has_rows($stmt))
{
	 
    print("<table border='1px'>");
    print("<tr><td>Karantina Liste</td></tr>");
	while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['karantina']."</td></tr>");

		
    }
    print("</table><br>");
};	
		
		

}}     

?>



</article>
</section>
<footer>
  <div id="share-buttons">
     <!-- Email -->
    <a href="mailto:kanapa79@gmail.com">
        <img src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email" />
    </a>
</div>
</footer>

</body>

</html>


