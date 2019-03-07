<?php
// YENİ ÜYE KAYIT DOSYASINDAN ALINAN VERİ DATABASE E YAZILIYOR

include ("baglan.php");

if (mysqli_query($conn)) 
{
echo " oldu bu iş";
}

else  

{echo "bağlanmadı";}





$cekoKullaniciAdi=$_POST["oKullaniciAdi"];
$cekopassword=$_POST["opassword"];
$cekoAdSoyad=$_POST["oAdSoyad"];
$cekoEPosta=$_POST["oEPosta"];
$cekoBiografi=$_POST["oBiografi"];

if(empty($cekoKullaniciAdi) or empty($cekopassword) or empty($cekoAdSoyad)or empty($cekoEPosta) or empty($cekoBiografi)) {
	echo "boş bırakmayınız" ;
}
else {

$sql = "INSERT INTO kisiler (KullaniciAdi,sifre,AdSoyad,email,biografi,onay)
 VALUES ('$cekoKullaniciAdi','$cekopassword','$cekoAdSoyad','$cekoEPosta','$cekoBiografi','0')";

 
 
if (mysqli_query($conn, $sql)) 
{
	header('Location:indexdna.html');
}

else  

{echo " uyumsuz kayıt lütfen istenen bilgileri giriniz";}

}

mysqli_close($conn);

?>