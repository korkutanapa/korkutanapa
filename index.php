
<html>
<head>
<Title>Report The Taxi Web Application</Title>
</head>
<body>

<form method="post" action="?action=add" enctype="multipart/form-data" >
    Taxi Plate <input type="text" name="t_a" id="t_a"/></br>
    Point <input type="text" name="t_b" id="t_b"/></br>
    In Location <input type="text" name="t_c" id="t_c"/></br>
    Out Location <input type="text" name="t_d" id="t_d"/></br>
	Weather <input type="text" name="t_e" id="t_e"/></br>
	Feedback_Compliant  <input type="text" name="t_f" id="t_f"/></br>
    <input type="submit" name="submit" value="Submit" />
</form>


<form method="post" action="?action=add1" enctype="multipart/form-data" >
    id_trip <input type="text" name="t_g" id="t_g"/></br>
    wheater <input type="text" name="t_h" id="t_h"/></br>

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
     $insertSql = "INSERT INTO [dbo].[kisiler] ([KullaniciAdi],[sifre],[AdSoyad],[email],[biografi],[onay]) VALUES (?,?,?,?,?,?)";
     $params = array(	&$_POST['t_a'],
                        &$_POST['t_b'],
                        &$_POST['t_c'],
                        &$_POST['t_d'],
						&$_POST['t_e'],
                        &$_POST['t_f']
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



if(isset($_GET['action']))
{
    if($_GET['action'] == 'add1')
    {
        /*Insert data.*/
     $insertSql = "INSERT INTO [dbo].[weather] ([id_trip],[weather]) VALUES (?,?)";
     $params = array(	&$_POST['t_g'],
                        &$_POST['t_h']
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





/*Display registered people.*/
$sql = "SELECT * FROM kisiler ORDER BY KullaniciAdi";
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
    print("<td>In Location</td>");
	print("<td>Out Location</td>");
	print("<td>Weather</td>");
    print("<td>Feedback_Complaint</td></tr>");
     
    while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['KullaniciAdi']."</td>");
        print("<td>".$row['sifre']."</td>");
        print("<td>".$row['AdSoyad']."</td>");
		print("<td>".$row['biografi']."</td>");
		print("<td>".$row['onay']."</td>");
        print("<td>".$row['email']."</td></tr>");
    }
    print("</table>");
}


?>
</body>
</html>
