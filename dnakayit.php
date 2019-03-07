
<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:reporttaxidbserver.database.windows.net,1433; Database = ReportTaxiDB", "becks", "774761Ka.");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "becks@reporttaxidbserver", "pwd" => "774761Ka.", "Database" => "ReportTaxiDB", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:reporttaxidbserver.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);



$cekoKullaniciAdi=$_POST["oKullaniciAdi"];
$cekopassword=$_POST["opassword"];
$cekoAdSoyad=$_POST["oAdSoyad"];
$cekoEPosta=$_POST["oEPosta"];
$cekoBiografi=$_POST["oBiografi"];

if(empty($cekoKullaniciAdi) or empty($cekopassword) or empty($cekoAdSoyad)or empty($cekoEPosta) or empty($cekoBiografi)) {
	echo "boş bırakmayınız" ;
}
else {

$sql = "INSERT INTO [dbo].[kisiler] (KullaniciAdi,sifre,AdSoyad,email,biografi,onay)
 VALUES ('$cekoKullaniciAdi','$cekopassword','$cekoAdSoyad','$cekoEPosta','$cekoBiografi','0')";

 echo $conn." ".$sql;
 
 
if (mysqli_query($conn,$sql)) {
	header('Location:index.html');
	

 
}else  {echo $sql . " uyumsuz kayıt lütfen istenen bilgileri giriniz";}
}

mysqli_close($conn);

?>