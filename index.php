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
  <p><b>A web application based on Azure</b></p>
  <p class="w3-padding-16"><button class="w3-button w3-black" onclick="myFunction()">RATE THE TAXI</button></p>
</header>
</div>

<!-- Photo Grid -->
<div class="w3-row" id="myGrid" style="margin-bottom:128px">
  <div class="w3-third">
    <img src="/w3images/rocks.jpg" style="width:100%">
    <img src="/w3images/sound.jpg" style="width:100%">
    <img src="/w3images/woods.jpg" style="width:100%">
    <img src="/w3images/rock.jpg" style="width:100%">
    <img src="/w3images/nature.jpg" style="width:100%">
    <img src="/w3images/mist.jpg" style="width:100%">
  </div>

  <div class="w3-third">
    <img src="/w3images/coffee.jpg" style="width:100%">
    <img src="/w3images/bridge.jpg" style="width:100%">
    <img src="/w3images/notebook.jpg" style="width:100%">
    <img src="/w3images/london.jpg" style="width:100%">
    <img src="/w3images/rocks.jpg" style="width:100%">
    <img src="/w3images/avatar_g.jpg" style="width:100%">
  </div>

  <div class="w3-third">
    <img src="/w3images/mist.jpg" style="width:100%">
    <img src="/w3images/workbench.jpg" style="width:100%">
    <img src="/w3images/gondol.jpg" style="width:100%">
    <img src="/w3images/skies.jpg" style="width:100%">
    <img src="/w3images/lights.jpg" style="width:100%">
    <img src="/w3images/workshop.jpg" style="width:100%">
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