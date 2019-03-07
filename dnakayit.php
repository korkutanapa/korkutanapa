<?php  
        // Variables to tune the retry logic.    
        $connectionTimeoutSeconds = 30;  // Default of 15 seconds is too short over the Internet, sometimes.  
        $maxCountTriesConnectAndQuery = 3;  // You can adjust the various retry count values.  
        $secondsBetweenRetries = 4;  // Simple retry strategy.  
        $errNo = 0;  
 
		$serverName = "tcp:reporttaxidbserver.database.windows.net,1433";
        $connectionOptions = array("Database"=>"ReportTaxiDB",  
           "Uid"=>"becks@reporttaxidbserver", "PWD"=>"774761Ka.", "LoginTimeout" => $connectionTimeoutSeconds);  
        $conn = null;  
        $conn = sqlsrv_connect($serverName, $connectionOptions);    
            if ($conn === true) {  
                echo "Connection was established";  
                echo "<br>";  
		}
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