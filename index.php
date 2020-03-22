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

</header>

<section>

<nav>


<h3>SICIL GIRISI 1.TEMAS </h3>
<form method="post" action="?action=closedanamoly" enctype="multipart/form-data" >
SICIL GIRINIZ <br><input type="text" name="t_a" autocomplete="off" id="t_a"/></br>
off vardiya no <br><input type="text" name="t_var" autocomplete="off" id="t_var"/></br>
sabah vardiya no <br><input type="text" name="t_var2" autocomplete="off" id="t_var2"/></br>

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
$var=$_POST['t_var'];
$var2=$_POST['t_var2'];
echo "$a";
echo "temas listesi";

$sqlvar="select vardiya from  dbo.corona where sicil='$a'";
$stmtvar = sqlsrv_query($conn,$sqlvar);

if ($stmtvar='4') 
{$vardiya=$var2;}
else
{$vardiya=$stmtvar;}
echo "$stmtvar";echo"$var";

if ($stmtvar=$var)
{echo"çalışan off vardiyada";}
else{

$sql = "
select sicil,servis,yemekhane,ekip,vardiya,servis2,servis3,statu,isim,soyisim,tel1,tel2
from dbo.corona 
where 
(yemekhane IN ( select yemekhane from  dbo.corona where sicil='$a'  ) and vardiya IN ( select vardiya from  dbo.corona where sicil='$a'))
or
(servis IN ( select servis from  dbo.corona where sicil='$a' )and vardiya IN ( select vardiya from  dbo.corona where sicil='$a') and servis<>'' and vardiya IN ( select vardiya from  dbo.corona where vardiya='$vardiya'))
or
(servis2 IN ( select servis2 from  dbo.corona where sicil='$a' )and vardiya IN ( select vardiya from  dbo.corona where sicil='$a')and servis2<>'')
or
(servis3 IN ( select servis3 from  dbo.corona where sicil='$a' )and vardiya IN ( select vardiya from  dbo.corona where sicil='$a')and servis3<>'')
or
(ekip IN ( select ekip from  dbo.corona where sicil='$a' )and vardiya IN ( select vardiya from  dbo.corona where sicil='$a'))
";
		
	
	$stmt = sqlsrv_query($conn,$sql);


    print("<table border='1px'>");
    print("<tr><td>Karantina Liste</td>
	<td>isim</td>
	<td>soyisim</td>
	<td>statu</td>
	<td>tel1</td>
	<td>tel2</td>
	<td>servistemas</td>
	<td>servis2temas</td>
	<td>servis3temas</td>
	<td>yemekhanetemas</td>
	<td>ekiptemas</td>
	<td>çalışanınvardiyası</td>
	<td></td>
	</tr>");
	while($row = sqlsrv_fetch_array($stmt))
    {
    print("<tr><td>".$row['sicil']."</td>
	<td>".$row['isim']."</td>
	<td>".$row['soyisim']."</td>
	<td>".$row['statu']."</td>
	<td>".$row['tel1']."</td>
	<td>".$row['tel2']."</td>
	<td>".$row['servis']."</td>
	<td>".$row['servis2']."</td>
	<td>".$row['servis3']."</td>
	<td>".$row['yemekhane']."</td>
	<td>".$row['ekip']."</td>
	<td>".$row['vardiya']."</td>
	</tr>");
		
		
    }
    print("</table><br>");




}} }    

?>






<h3>veri güncelleme </h3>
<form method="post" action="?action=CHANGE" enctype="multipart/form-data" >
SICIL GIRINIZ <br><input type="text" name="t_1" autocomplete="off" id="t_1"/></br>
YEMEK MASASI GIRINIZ <br><input type="text" name="t_3" autocomplete="off" id="t_3"/></br>
EKIP GIRINIZ <br><input type="text" name="t_4" autocomplete="off" id="t_4"/></br>
VARDIYA GIRINIZ <br><input type="text" name="t_5" autocomplete="off" id="t_5"/></br>
SERVIS GIRINIZ <br><input type="text" name="t_6" autocomplete="off" id="t_6"/></br>
SERVIS2 GIRINIZ <br><input type="text" name="t_7" autocomplete="off" id="t_7"/></br>
SERVIS3 GIRINIZ <br><input type="text" name="t_8" autocomplete="off" id="t_8"/></br>
STATU GIRINIZ <br><input type="text" name="t_9" autocomplete="off" id="t_9"/></br>
<input type="submit" name="submit" value="DEGISTIR" />
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
    if($_GET['action'] == 'CHANGE')
    {

$a1=$_POST['t_1'];
$a3=$_POST['t_3'];
$a4=$_POST['t_4'];
$a5=$_POST['t_5'];
$a6=$_POST['t_6'];
$a7=$_POST['t_7'];
$a8=$_POST['t_8'];
$a9=$_POST['t_9'];


$sql2 = 
"update dbo.corona
set yemekhane='$a3',ekip='$a4',vardiya='$a5',servis='$a6',servis2='$a7',servis3='$a8',statu='$a9'
where sicil='$a1' ";


if (sqlsrv_query($conn,$sql2)) {
	echo "ok";
}else  {echo " degistirilemedi";echo "$a1";}
}
}
?>

</nav>


<nav>


<h3>SICIL GIRISI 2.TEMAS </h3>
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
echo "temas listesi";
$sql = "
select sicil,servis,yemekhane,ekip,vardiya,servis2,servis3,statu,isim,soyisim,tel1,tel2
from dbo.corona 
where 
(yemekhane IN ( select yemekhane from  dbo.corona where sicil='$aa'  ) and vardiya IN ( select vardiya from  dbo.corona where sicil='$aa'))
or
(servis IN ( select servis from  dbo.corona where sicil='$aa' )and vardiya IN ( select vardiya from  dbo.corona where sicil='$aa')and servis<>'')
or
(servis2 IN ( select servis2 from  dbo.corona where sicil='$aa' )and vardiya IN ( select vardiya from  dbo.corona where sicil='$aa')and servis2<>'')
or
(servis3 IN ( select servis3 from  dbo.corona where sicil='$aa' )and vardiya IN ( select vardiya from  dbo.corona where sicil='$aa')and servis3<>'')
or
(ekip IN ( select ekip from  dbo.corona where sicil='$aa' )and vardiya IN ( select vardiya from  dbo.corona where sicil='$aa'))
";
		
	
	$stmt = sqlsrv_query($conn,$sql);


    print("<table border='1px'>");
    print("<tr><td>Karantina Liste</td>
	<td>isim</td>
	<td>soyisim</td>
	<td>statu</td>
	<td>tel1</td>
	<td>tel2</td>
	<td>servistemas</td>
	<td>servis2temas</td>
	<td>servis3temas</td>
	<td>yemekhanetemas</td>
	<td>ekiptemas</td>
	<td>çalışanınvardiyası</td>
	<td></td>
	</tr>");
	while($row = sqlsrv_fetch_array($stmt))
    {
    print("<tr><td>".$row['sicil']."</td>
	<td>".$row['isim']."</td>
	<td>".$row['soyisim']."</td>
	<td>".$row['statu']."</td>
	<td>".$row['tel1']."</td>
	<td>".$row['tel2']."</td>
	<td>".$row['servis']."</td>
	<td>".$row['servis2']."</td>
	<td>".$row['servis3']."</td>
	<td>".$row['yemekhane']."</td>
	<td>".$row['ekip']."</td>
	<td>".$row['vardiya']."</td>
	</tr>");
		
		
    }
    print("</table><br>");




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


