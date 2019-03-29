
<?php
// ÜYE BİLGİSİ SESSİON ÖZELLİĞİ İLE AKTARILDI
session_start();
?>

<?php
// VERİ BAĞLANTI DOSYASI İLE DATABASE BAĞLANTISI
include ("connection.php");

// İNDEXDNA SAYFASINDAN GELEN VERİYİ VERİTABANINDA KONTROL ET
$kadi=$_POST["username"];
$sifre=$_POST["password"];



//BU SORGU DA ÜYE KAYITLI İSE SİSTEME YÖNLENDİR ÜYE ADMİN İSE YONETİCİ SAYFASINA YÖNLENDİR
$sql = "SELECT * FROM users WHERE (password='$sifre' and username='$kadi' and onay='1')";
		if ($result=mysqli_query($conn,$sql))
		
				{$count=mysqli_num_rows($result);

						if ($count==1){
						$_SESSION["username"] = $kadi;
						switch ($kadi)  {
						case "admin":
						header('Location:DATABASE.php');
					
						break;
						default:
						header('Location:DATABASE.php');
										}
						
			
						}else {
				echo " something went wrong <a href=index.php> please enter </a>" ;
				}
		
				}
		
				else {
				echo " something went wrong <a href=index.php> please enter </a>" ;
				}
	
		
mysqli_close($conn);
	
?>	
