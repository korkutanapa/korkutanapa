
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
background-repeat:no-repeat;

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

<h3>TAXI DATABASE OF THE WORLD   </h3>
<?php

session_start();
echo $_SESSION["username"];
?>

</div>


<div class="alt-kutular">

<h3>TAXI DATABASE ( ONLY FOR DEVELOPMENT ISSUES )  </h3>


<form id="form1" name="form1" method="post" action="logout.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: comic sans ms;" type="submit" name="Submit" id="button" value="logout" />
</p>
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


/*Display registered people.*/
$sql = "SELECT * FROM trip ORDER BY taxiplate";
$stmt = sqlsrv_query($conn, $sql);
if($stmt === false)
{
    die(print_r(sqlsrv_errors(), true));
}
if(sqlsrv_has_rows($stmt))
{
    print("<table border='1px'>");
    print("<tr><td>Taxi Plate</td>");
    print("<td>Point</td>");
       
    while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['taxiplate']."</td>");
     
        print("<td>".$row['star']."</td></tr>");
    }
    print("</table>");
}


?>


</body>
</div>
</div>
</html>


