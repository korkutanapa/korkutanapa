
<?php

$connectionInfo = array("UID" => "becks@reporttaxidbserver", "pwd" => "774761Ka.", "Database" => "ReportTaxiDB", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:reporttaxidbserver.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

if (mysqli_query($conn)) {
	header('Location:index.html');
}else  {echo " Korkut Bağlanamıyorum";}




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

 
if (mysqli_query($sql)) {
	header('Location:index.html');
}else  {echo " bağlandım ama yazamıyorum ";}
}

mysqli_close($conn);

?>