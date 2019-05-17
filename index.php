<!DOCTYPE html>
<html lang="en">
<head>
<title>REPORTAXI</title>
<meta charset="utf-8">
<meta name="keywords" content="Reportaxi,korkutratetaxi,ratetaxi,becks">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  background-color: #666;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
}

/* Container for flexboxes */
section {
  display: -webkit-flex;
  display: flex;
}

/* Style the navigation menu */
nav {
  -webkit-flex: 1;
  -ms-flex: 1;
  flex: 1;
  background: #ccc;
  padding: 20px;
	background-image: url("");
	background-position:center;
	background-repeat:no-repeat;

}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

/* Style the content */
article {
  -webkit-flex: 3;
  -ms-flex: 3;
  flex: 3;
  background-color: #f1f1f1;
  padding: 10px;
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}

/* Responsive layout - makes the menu and the content (inside the section) sit on top of each other instead of next to each other */
@media (max-width: 600px) {
  section {
    -webkit-flex-direction: column;
    flex-direction: column;
  }
}

/* For tables  */
table {
  border-collapse: collapse;
  width: 75%;
}

th, td {
  text-align: center;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}

</style>
</head>

	<body>

<header>
 <h2>REPORTAXI WEB APPLICATION</h2>
 <p>by BECKS</p>
 <!-- weather widget start --><div id="m-booked-bl-simple-51630"> <div class="booked-wzs-160-110 weather-customize" style="background-color:#137AE9;width:160px;" id="width1"> <div class="booked-wzs-160-110_in"> <a target="_blank" class="booked-wzs-top-160-110" href="https://www.booked.net/"><img src="//s.bookcdn.com/images/letter/s5.gif" alt="Hotel reservations - booked.net" /></a> <div class="booked-wzs-160-data"> <div class="booked-wzs-160-left-img wrz-18"></div> <div class="booked-wzs-160-right"> <div class="booked-wzs-day-deck"> <div class="booked-wzs-day-val"> <div class="booked-wzs-day-number"><span class="plus">+</span>28</div> <div class="booked-wzs-day-dergee"> <div class="booked-wzs-day-dergee-val">&deg;</div> <div class="booked-wzs-day-dergee-name">C</div> </div> </div> <div class="booked-wzs-day"> <div class="booked-wzs-day-d"><span class="plus">+</span>28&deg;</div> <div class="booked-wzs-day-n"><span class="plus">+</span>16&deg;</div> </div> </div> <div class="booked-wzs-160-info"> <div class="booked-wzs-160-city">Ankara</div> <div class="booked-wzs-160-date">Friday, 17</div> </div> </div> </div> <a target="_blank" href="https://www.booked.net/weather/ankara-18522" class="booked-wzs-bottom-160-110"> <div class="booked-wzs-center"><span class="booked-wzs-bottom-l"> See 7-Day Forecast</span></div> </a> </div> </div> </div><script type="text/javascript"> var css_file=document.createElement("link"); css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href",'https://s.bookcdn.com/css/w/booked-wzs-widget-160.css?v=0.0.1'); document.getElementsByTagName("head")[0].appendChild(css_file); function setWidgetData(data) { if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = document.getElementById('m-booked-bl-simple-51630'); if(objMainBlock !== null) { var copyBlock = document.getElementById('m-bookew-weather-copy-'+data.results[i].widget_type); objMainBlock.innerHTML = data.results[i].html_code; if(copyBlock !== null) objMainBlock.appendChild(copyBlock); } } } else { alert('data=undefined||data.results is empty'); } } </script> <script type="text/javascript" charset="UTF-8" src="https://widgets.booked.net/weather/info?action=get_weather_info&ver=6&cityID=18522&type=1&scode=2&ltid=3457&domid=w209&anc_id=57808&cmetric=1&wlangID=1&color=137AE9&wwidth=160&header_color=ffffff&text_color=333333&link_color=08488D&border_form=1&footer_color=ffffff&footer_text_color=333333&transparent=0"></script><!-- weather widget end -->
</header>

<section>
<nav>

<form id="form1" name="form1" method="post" action="login_a.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="Login " />
</p>
</form>



<form id="form1" name="form1" method="post" action="registration.php">
<p>
<input style="background-color:#D3D3D3;width:350px;height:40px;font-size:16pt;margin-left:20px;font-family: Times New Roman;" type="submit" name="Submit" id="button" value="New User Registration " />
</p>
</form>

<a class="twitter-timeline" href="https://twitter.com/AnapaKorkut?ref_src=twsrc%5Etfw">Tweets by AnapaKorkut</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

</nav>


<article>

<h3>TOP 3 BEST TAXI</h3>
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
$sql = "SELECT TOP 3 taxiplate as tr, AVG(star) AS th FROM trip GROUP BY taxiplate ORDER BY th DESC ";

$stmt = sqlsrv_query($conn,$sql);


if(sqlsrv_has_rows($stmt))
{
	 
    print("<table border='1px'>");
    print("<tr><td>Taxi Plate</td>");
	print("<td>Average Point</td></tr>");
    while($row = sqlsrv_fetch_array($stmt))
    {
         
        print("<tr><td>".$row['tr']."</td>");
  		print("<td>".$row['th']."</td></tr>");
		
    }
    print("</table><br>");
};


?>

<form method="post" action="?action=querytaxiplate" enctype="multipart/form-data" >
    <h3>ENTER TAXI PLATE FOR SEARCH (format must be 01T0001)</h3><input type="text" autocomplete="off" pattern="[0-9]{2}[A-Z]{1}[0-9]{4}" name="t_a" id="t_a"/>
    <input type="submit" name="submit" value="Submit" /><br>
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

if(isset($_GET['action']))
{
    if($_GET['action'] == 'querytaxiplate')
    {
	$a=$_POST['t_a'];
    }
}

$sql = "SELECT AVG(star) AS th FROM trip WHERE taxiplate='$a'";
$stmt = sqlsrv_query($conn, $sql);
if($stmt === false)
{
	die(print_r(sqlsrv_errors(), true));
}
if(sqlsrv_has_rows($stmt))
{
  
    echo " ";
       
    while($row = sqlsrv_fetch_array($stmt))
    {
            
			 if($row['th']==1) {echo"<p>Taxi plate  ". $a."  has a point ". $row['th']." POOR TAXI</p>";}
			 if($row['th']==2) {echo"<p>Taxi plate  ". $a."  has a point ". $row['th']." FAIR TAXI</p>";}
			 if($row['th']==3) {echo"<p>Taxi plate  ". $a."  has a point ". $row['th']." GOOD TAXI</p>";}
			 if($row['th']==4) {echo"<p>Taxi plate  ". $a."  has a point ". $row['th']." VERY GOOD TAXI</p>";}
			 if($row['th']==5) {echo"<p>Taxi plate  ". $a."  has a point ". $row['th']." EXCELLENT TAXI</p>";}
			 if($row['th']==0) {echo"<p> sorry no taxi with  ". $a ."  please enter a valid taxi plate  </p>";}
    }
  
}



?>


					</article>
			</section>
<footer>
  <div id="share-buttons">
    

    

    
    <!-- Email -->
    <a href="mailto:kanapa79@gmail.com">
        <img src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email" />
    </a>
 
    <!-- Facebook -->
    <a href="http://www.facebook.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
    </a>
    
    <!-- Google+ -->
    <a href="https://plus.google.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
    </a>
    
    <!-- LinkedIn -->
    <a href="http://www.linkedin.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/linkedin.png" alt="LinkedIn" />
    </a>
    
        
    <!-- Print -->
    <a href="javascript:;" onclick="window.print()">
        <img src="https://simplesharebuttons.com/images/somacro/print.png" alt="Print" />
    </a>
    

    
    <!-- Tumblr-->
    <a href="http://www.tumblr.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/tumblr.png" alt="Tumblr" />
    </a>
     
    <!-- Twitter -->
    <a href="https://twitter.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
    </a>

	</div>
</footer>

</body>

</html>


