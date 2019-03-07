<?php
$servername = "localhost";
$username = "root";
 $password = "";


// Create connection
 $conn = mysqli_connect($servername, $username, $password);
 $veri = mysqli_select_db ($conn,"dna");
if (!$veri) {
	echo "Baglantida problem var";
	}

?> 



