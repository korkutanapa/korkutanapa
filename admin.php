<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/></head>
<style type="text/css">
#flex-kutu{
width:auto;
height:auto;
display:flex;
border:2px solid silver;
flex-direction:row;
background-color:#FFA500;
}


h1 {
font-size: 80px;
font-family: Comic Sans MS;
color: blue;
text-align:center;
}

p{
margin-left: 20px;
font-size: 30px;
font-family: comic sans ms;
color: black;
}
ppp{
margin-left: 2px;
font-size: 20px;
font-family: comic sans ms;
color: black;
}

.alt-kutular{
width:1500;
margin:15px;
padding:5px;
background-color:#D3D3D3;
background-repeat:no-repeat;

}
.alt-kutularana{
width:3000;
margin:15px;
padding:5px;
background-color:#D3D3D3;
background-image: url("iconel.jpg");
background-position:lrft;
background-repeat:no-repeat;
}
.alt-kutularana2{
width:3000;
margin:15px;
padding:5px;
background-color:#D3D3D3;
background-position:lrft;
background-repeat:no-repeat;
}

</style>


<body>
<div id ="flex-kutu">
		<div class="alt-kutularana">
		<p style="margin-left:150px;"> SAYIN YÖNETİCİ HOŞGELDİNİZ 
		
		
							<form id="form1" name="form1" method="post" action="logout.php">
							<p>
							<input style="background-color:#D3D3D3;width:100px;height:40px;font-size:16pt;margin-left:150px;font-family: comic sans ms;" type="submit" name="Submit" id="button" value="ÇIKIŞ" />
							</p>
							</form>
												
							
		
		</div>
</div>


<div id ="flex-kutu">

		
<div class="alt-kutular">
	

<p>Onaylanacak Kişiler </p>
<ppp>
					<?php
					// ÖNCEDEN KAYIT YAPTIRMIŞ KİŞİLERİN ONAYLANACAK KİŞİLERİN LİSTESİ
					echo"<table border='1' width='350' height'30'>";
					echo "<tr>";
					echo "<td width=50 height=30>ÜYE NO</td>";
	
					echo "<td width=150 height=30>YENİ ÜYE AD SOYAD</td>";

					echo "<td width=150 height=30>E POSTA</td>";

		
                    				
					echo"</tr>";
					echo"</table>";
					
					?>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dna";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 } 

 
 
 
$sql = "SELECT * FROM kisiler WHERE onay='0'";
$result = mysqli_query($conn,$sql);
while ($b=mysqli_fetch_array($result)){
                     
                  
                    $a = $b['AdSoyad'];
					$c = $b['email'];
                	$d = $b['indexkisiler'];
          
                    
                  
					echo"<table border='1' width='350' height'30'>";
					echo "<tr>";
	
					echo "<td width=50 height=30>$d</td>";

					echo "<td width=150 height=30>$a</td>";

					echo "<td width=150 height=30>$c</td>";
		
                    				
					echo"</tr>";
					echo"</table>";}
					
					?>
	</ppp>				
					<form id="form1" name="form1" method="post" action="kisionayla.php">
				  <p>ONAYLA KİŞİ</p>
				  <p>
					<label> 
					  <input type="text" name="oindexkisiler" id="oindexkisiler"  />
					</label>
				  </p>
				  <p>
	<?php
				echo"<input style='background-color:#D3D3D3;width:120px;height:50px;font-size:16pt;margin-left:20px;font-family: comic sans ms' type='submit' name='Submit' id='button' value='GÖNDER' />";
				
				
				
				
				
				
				
				
				?>
	</form>
	<p>

 
</div>
<div class="alt-kutular">	
<p>RAPOR-1 </p>
			 <br>
			<ppp>Kullanıcılar</ppp>	<br>
			
			<ppp>
			<?php
			echo"<table border='1' width='350' height'30'>";
				echo "<tr>";
				echo "<th width=50 height=30><ppp>Üye No</ppp></th>";
				echo "<th width=300 height=30><ppp>Ad Soyad</ppp></th>";
				echo"</tr>";
				echo"</table>";
			
			?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dna";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 } 

$sql = "select * FROM kisiler WHERE onay='1'";
$result = mysqli_query($conn,$sql);
while ($b=mysqli_fetch_array($result)){
                     
                   
                    $a = $b['indexkisiler'];
					  $c = $b['AdSoyad'];
              
                    
					echo"<table border='1' width='350' height'30'>";
								echo "<tr>";
								echo "<td width=50 height=30>$a</td>";
								echo "<td width=300 height=30>$c</td>";
								echo"</tr>";
								echo"</table>";}
					
					?>
			</ppp>		
</div>
<div class="alt-kutular">	
<p>RAPOR-2 </p>
			 <br>
<ppp>Gruplar</ppp>	<br>
			
<ppp>

<?php
			echo"<table border='1' width='350' height'30'>";
			echo "<tr>";
			echo "<th width=50 height=30><ppp>Grup No</ppp></td>";
			echo "<th width=300 height=30><ppp>İlgi Grupları</ppp></td>";
			echo"</tr>";
			echo"</table>";
			
			?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dna";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 } 

$sql = "select * FROM ilgigrubu WHERE onay='1'";
$result = mysqli_query($conn,$sql);
while ($b=mysqli_fetch_array($result)){
                     
                   //Dizi içerisine giriyoruz ve Tablo içerisinden çekilecek olan tüm sütunları tek tek değişken ierisine atıyoruz.
                    $a = $b['indexilgigrubu'];
					  $c = $b['ilgigrubuadi'];
              
                    //Tablonun ikinci satırına denk gelen bu alanda gerekli yerlere bu değişkenleri giriyoruz. 
					echo"<table border='1' width='350' height'30'>";
								echo "<tr>";
								echo "<td width=50 height=30>$a</td>";
								echo "<td width=300 height=30>$c</td>";
								echo"</tr>";
								echo"</table>";}
					
					?>
</div>
</div>