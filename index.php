<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1 {font-family: "Montserrat", sans-serif}
img {margin-bottom: -7px}
.w3-row-padding img {margin-bottom: 12px}
</style>
<body>

<!-- Sidebar -->
<nav class="w3-sidebar w3-black w3-animate-top w3-xxlarge" style="display:none;padding-top:150px" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-black w3-xxlarge w3-padding w3-display-topright" style="padding:6px 24px">
    <i class="fa fa-remove"></i>
  </a>
  <div class="w3-bar-block w3-center">
    <a href="#" class="w3-bar-item w3-button w3-text-grey w3-hover-black">About</a>
    <a href="#" class="w3-bar-item w3-button w3-text-grey w3-hover-black">Rate The Taxi</a>
    <a href="#" class="w3-bar-item w3-button w3-text-grey w3-hover-black">Complaint</a>
    <a href="#" class="w3-bar-item w3-button w3-text-grey w3-hover-black">Feedback</a>
  </div>
</nav>

<!-- !PAGE CONTENT! -->
<div class="w3-content" style="max-width:1500px">

<!-- Header -->
<div class="w3-opacity">
<span class="w3-button w3-xxlarge w3-white w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></span> 
<div class="w3-clear"></div>
<header class="w3-center w3-margin-bottom">
  <h1><b>RATE THE TAXI</b></h1>
  
			<?php

 require_once('vendor/autoload.php'); 
 use \Brightzone\GremlinDriver\Connection; 
  
 error_reporting(E_ALL ^ E_WARNING); 
  
 // Write your own configuration values here 
 $db = new Connection([ 
     'host' => '<your_server_address>.graphs.azure.com', 
     'username' => '/dbs/<db>/colls/<coll>', 
     'password' => 'your_primary_key' 
     ,'port' => '443' 
  
     // Required parameter 
     ,'ssl' => TRUE 
 ]); 
  
 $db->timeout = 0.5;  
  
 function dropGraph($db) 
 { 
     $query = "g.V().drop()"; 
     printf("\t%s\n\tQuery: %s\n", "Dropping entire graph.", $query); 
    $result = $db->send($query); 
     $errors = array_filter($result); 
  
     if($errors) 
     { 
         printf("\tSomething went wrong with this query:\n%s\n",$query); 
         die(); 
     } 
  
     printf("\tSuccesfully dropped the graph\n\n"); 
 } 
  
 $_queries_insert_vertices = array( 
     "Adding Thomas" => "g.addV('person').property('id', 'thomas').property('firstName', 'Thomas').property('age', 44)", 
     "Adding Mary" => "g.addV('person').property('id', 'mary').property('firstName', 'Mary').property('lastName', 'Andersen').property('age', 39)", 
     "Adding Ben" => "g.addV('person').property('id', 'ben').property('firstName', 'Ben').property('lastName', 'Miller')", 
     "Adding Robin" => "g.addV('person').property('id', 'robin').property('firstName', 'Robin').property('lastName', 'Wakefield')" 
  
 ); 
  
 function addVertices($db, $_queries_insert_vertices) 
 { 
     $i = 0; 
     foreach ($_queries_insert_vertices as $key => $value) 
     { 
         printf("\t%s\n\tQuery: %s\n", $key, $value); 
         $result = $db->send($value); 
         $i++; 
         if(!$result) 
         { 
             printf("\tSomething went wrong with this query:\n%s\n",$value); 
             $i--; 
         } 
     } 
     printf("\tSuccessfully inserted: %d vertices\n\n",$i); 
 } 
  
 $_queries_insert_edges = array( 
     "Thomas knows Mary" => "g.V('thomas').addE('knows').to(g.V('mary'))", 
     "Thomas knows Ben" => "g.V('thomas').addE('knows').to(g.V('ben'))", 
     "Ben knows Robin" => "g.V('ben').addE('knows').to(g.V('robin'))" 
 ); 
  
 function addEdges($db, $_queries_insert_edges) 
 { 
     $i = 0; 
     foreach ($_queries_insert_edges as $key => $value) 
     { 
         printf("\t%s\n\tQuery: %s\n", $key, $value); 
         $result = $db->send($value); 
         $i++; 
         if(!$result) 
         { 
             printf("\tSomething went wrong with this query:\n%s\n",$value); 
             $i--; 
         } 
     } 
     printf("\tSuccessfully inserted: %d edges\n\n",$i); 
 } 
 
 function countVertices($db) 
 { 
     $query = "g.V().count()"; 
     printf("\t%s\n\tQuery: %s\n", "Counting all the vertices.", $query); 
     $result = $db->send($query); 
  
     if($result) 
     { 
         printf("\tNumber of vertices in this graph: %s\n\n", $result[0]); 
     } 
 } 
  
 function pressAnyKeyToContinuePrompt($message) 
 { 
     printf("%s. Press any key to continue\n", $message); 
     $fp = fopen("php://stdin","r"); 
     fgets($fp); 
 } 
  
 try { 
  
     print "Welcome to Azure Cosmos DB + Gremlin on PHP!\n\n"; 
     print "Attempting to connect...\n"; 
     $db->open(); 
     print "Successfully connected to the database\n\n"; 
  
     pressAnyKeyToContinuePrompt("We will proceed to drop whatever graph is on your collection."); 
     dropGraph($db); 
  
     pressAnyKeyToContinuePrompt("Great! Now that we have a fresh collection we can proceed to insert a few vertices."); 
     addVertices($db, $_queries_insert_vertices); 
  
     pressAnyKeyToContinuePrompt("Now that we have the vertices, let's add a relationship between them."); 
     addEdges($db, $_queries_insert_edges); 
      
     pressAnyKeyToContinuePrompt("Cool! Now let's see how many edges are there in the graph."); 
     countVertices($db); 
      
     pressAnyKeyToContinuePrompt("And that's our demo!"); 
  
     $db->close(); 
 } catch (Exception $e) { 
     echo 'Caught exception: ',  $e->getMessage(), "\n"; 
 } 
 			
			?> 
  
  <p><b>A web application based on Azure</b></p>
  <p class="w3-padding-16"><button class="w3-button w3-black" onclick="myFunction()">RATE THE TAXI</button></p>
	<p class="w3-padding-16"><button class="w3-button w3-black" onclick="connection_nosqldatabase.php">RATE THE TAXI 2</button></p>
</header>
</div>

<!-- Photo Grid -->
<div class="w3-row" id="myGrid" style="margin-bottom:128px">
  <div class="w3-third">
    <img src="/taxi.jpg" style="width:100%">

  </div>

  <div class="w3-third">
    <img src="becks.jpg" style="width:100%">

  </div>

</div>

<!-- End Page Content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-opacity w3-xlarge" style="margin-top:128px"> 
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">BECKS</a></p>
</footer>
 
<script>
// Toggle grid padding
function myFunction() {
  var x = document.getElementById("myGrid");
  if (x.className === "w3-row") {
    x.className = "w3-row-padding";
  } else { 
    x.className = x.className.replace("w3-row-padding", "w3-row");
  }
}

// Open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.width = "100%";
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

</body>
</html>