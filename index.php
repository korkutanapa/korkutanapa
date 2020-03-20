<!DOCTYPE html>
<html lang="en">
<head>
<title>İŞLETME YAYILIM ÖNLEME VERİ TABANI</title>
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
</head>

</style>

<body>

<header>
 <h2>İŞLETME YAYILIM ÖNLEME VERİ TABANI</h2>
 <p>by </p>
</header>

<section>

<nav>



<h3>SICIL GIRISI 1.BULAŞMA </h3>
<form method="post" action="?action=closedanamoly" enctype="multipart/form-data" >
SICIL GIRINIZ <br><input type="text" name="t_a" autocomplete="off" id="t_a"/></br>
<input type="submit" name="submit" value="LİSTE TARA" />
</form>


<?php


$serverName = "tcp:korkutse599server.database.windows.net,1433";
$connectionOptions = array("Database"=>"korkutse599db",
                           "UID"=>"korkut",
                           "PWD" => "774761Ka.");
$conn = sqlsrv_connect($serverName, $connectionOptions);

if($conn === false)
{
    echo "olmadı";
}

if(isset($_GET['action']))
{
    if($_GET['action'] == 'closedanamoly')
    {

$a=$_POST['t_a'];
echo "$a";
$sql = "



select sicil,servis,yemekhane,ekip,vardiya
from dbo.corona 
where 
(yemekhane IN ( select yemekhane from  dbo.corona where sicil='$a'  ) and vardiya IN ( select vardiya from  dbo.corona where sicil='$a'))
or
(servis IN ( select servis from  dbo.corona where sicil='$a' )and vardiya IN ( select vardiya from  dbo.corona where sicil='$a'))
or
(ekip IN ( select ekip from  dbo.corona where sicil='$a' )and vardiya IN ( select vardiya from  dbo.corona where sicil='$a'))



";
		
	
$stmt = sqlsrv_query($conn,$sql);

echo "ok";

    print("<table border='1px'>");
    print("<tr><td>Karantina Liste</td>
	
	<td>servisbulaştırma</td>
	<td>yemekhanebulaştırma</td>
	<td>ekipbulaştırma</td>
	<td>çalışanınvardiyası</td>
	
	</tr>");
	while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['sicil']."</td>
		<td>".$row['servis']."</td>
		<td>".$row['yemekhane']."</td>
		<td>".$row['ekip']."</td>
		<td>".$row['vardiya']."</td>
		
		
		
		
		</tr>");
		
		
    }
    print("</table><br>");




}}     

?>

</nav>


<nav>


<h3>SICIL GIRISI 2.BULAŞMA </h3>
<form method="post" action="?action=closed" enctype="multipart/form-data" >
SICIL GIRINIZ <br><input type="text" name="t_b" autocomplete="off" id="t_b"/></br>
<input type="submit" name="submit" value="LİSTE TARA" />
</form>


<?php


$serverName = "tcp:korkutse599server.database.windows.net,1433";
$connectionOptions = array("Database"=>"korkutse599db",
                           "UID"=>"korkut",
                           "PWD" => "774761Ka.");
$conn = sqlsrv_connect($serverName, $connectionOptions);

if($conn === false)
{
    echo "olmadı";
}

if(isset($_GET['action']))
{
    if($_GET['action'] == 'closed')
    {

$aa=$_POST['t_b'];
echo "$aa";
$sql = "



select sicil,servis,yemekhane,ekip,vardiya
from dbo.corona 
where 
(yemekhane IN ( select yemekhane from  dbo.corona where sicil='$aa'  ) and vardiya IN ( select vardiya from  dbo.corona where sicil='$aa'))
or
(servis IN ( select servis from  dbo.corona where sicil='$aa' )and vardiya IN ( select vardiya from  dbo.corona where sicil='$aa'))
or
(ekip IN ( select ekip from  dbo.corona where sicil='$aa' )and vardiya IN ( select vardiya from  dbo.corona where sicil='$aa'))



";
		
	
$stmt = sqlsrv_query($conn,$sql);

echo "ok";

    print("<table border='1px'>");
    print("<tr><td>Karantina Liste</td>
	<td>servisbulaştırma</td>
	<td>yemekhanebulaştırma</td>
	<td>ekipbulaştırma</td>
	<td>çalışanınvardiyası</td>
	</tr>");
	
	while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['sicil']."</td>
		<td>".$row['servis']."</td>
		<td>".$row['yemekhane']."</td>
		<td>".$row['ekip']."</td>
		<td>".$row['vardiya']."</td>
		</tr>");
		
		
    }
    print("</table><br>");
	
$to = "korkut.anapa@arcelik.com";
$subject = "karantina listesi";
$txt = $stmt;
$headers = "From: kanapa79@gmail.com\r\n";

mail($to,$subject,$txt,$headers);

}}     

?>




</nav>

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


