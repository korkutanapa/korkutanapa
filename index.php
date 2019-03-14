
<html>
<head>
<Title>Azure SQL Database - PHP Website</Title>
</head>
<body>
<form method="post" action="?action=add" enctype="multipart/form-data" >
    Taxi Plakası <input type="text" name="t_emp_id" id="t_emp_id"/></br>
    Puanı <input type="text" name="t_name" id="t_name"/></br>
    Biniş Lokasyon <input type="text" name="t_education" id="t_education"/></br>
    İniş Lokasyon <input type="text" name="t_email" id="t_email"/></br>
	Hava <input type="text" name="t_a" id="t_a"/></br>
	geri bildirim  <input type="text" name="t_b" id="t_b"/></br>
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
     $params = array(&$_POST['t_emp_id'],
                        &$_POST['t_name'],
                        &$_POST['t_education'],
                        &$_POST['t_email'],
						 &$_POST['t_a'],
                        &$_POST['t_b']
						
						
						
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
    print("<tr><td>Taksi No</td>");
    print("<td>puan</td>");
    print("<td>binis</td>");
	 print("<td>inis</td>");
	  print("<td>hava</td>");
    print("<td>geribildirim</td></tr>");
     
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
}*/
?>
</body>
</html>
