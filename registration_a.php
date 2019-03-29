<?php
// YENİ ÜYE KAYIT DOSYASINDAN ALINAN VERİ DATABASE E YAZILIYOR

include ("connection.php");

$cekoKullaniciAdi=$_POST["oKullaniciAdi"];
$cekopassword=$_POST["opassword"];
$cekoAdSoyad=$_POST["oAdSoyad"];
$cekoEPosta=$_POST["oEPosta"];
$cekoBiografi=$_POST["oBiografi"];

if(empty($cekoKullaniciAdi) or empty($cekopassword) or empty($cekoAdSoyad)or empty($cekoEPosta) or empty($cekoBiografi)) {
	echo "boş bırakmayınız" ;
}
else {



$sql = "INSERT INTO [dbo].[users] ([username],[password],[name_surname],[phone_no],[id_no],[approve])
 VALUES ('$cekoKullaniciAdi','$cekopassword','$cekoAdSoyad','$cekoEPosta','$cekoBiografi','0')";

 
 
if (mysqli_query($conn, $sql)) {
	header('Location:index.php');
	
	
 
}else  {echo " please enter values correctly";}
}

mysqli_close($conn);

?>