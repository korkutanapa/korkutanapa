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
color:blue;
text-align:center;
}

p{
margin-left: 50px;
font-size: 30px;
font-family: comic sans ms;
color: black;
}

.alt-kutular{
width:1500;
margin:30px;
padding:5px;
background-color:#D3D3D3;

}

.alt-kutularana{
width:1500;
margin:30px;
padding:5px;
background-color:#D3D3D3;
background-image: url("ELLER11.jpg");
background-position:center;
background-repeat:no-repeat;
}

</style>


<body>
<div id ="flex-kutu">
<div class="alt-kutularana">
<h3>RATE THE TAXI WEB APPLICATION </h3>
<h4>REGISTRATION </h4>
</div>

<div class="alt-kutular">
<form id="form1" name="form1" method="post" action="registration_a.php">
  <p text-align: center style="color: blue;">REGISTRATION</p>
    <br>  <br>     
    
  <table >
		<tr>
		<td height="60px"><p>Username: </p></td><td ><input style="height:30px;width:200px;font-size:12pt;" type="text" name="oKullaniciAdi" id="oKullaniciAdi"  ></td>
		</tr>
		<tr>
		<td><p>Password: </p></td><td><input style="height:30px;width:200px;font-size:12pt;" type="password" name="opassword" id="opassword" /></td>
		</tr>
		<tr>
		<td height="60px"><p>Name Surname</p></td><td ><input style="height:30px;width:200px;font-size:12pt;" type="text" name="oAdSoyad" id="oAdSoyad"  ></td>
		</tr>
		<tr>
		<td height="60px"><p>Phone No: </p></td><td ><input style="height:30px;width:200px;font-size:12pt;" type="text" name="oEPosta" id="oEPosta" ></td>
		</tr>
		<tr>
		<td height="60px"><p>Identification no: </p></td><td ><textarea style="font-size:12pt;" type="text" name="oBiografi" id="oBiografi" cols="30" rows="4"  ></textarea></td>
		</tr>
	</table>
  
  
  
  
  <br>  <br>
    <<button style="background-color:#D3D3D3;width:100px;height:50px;font-size:16pt;margin-left:270px;font-family: comic sans ms;"  type="submit" name="Submit" id="button"> <b> register </button>
 <br>  <br>
</form>

</div>





