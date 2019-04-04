<html>
    <title>
        Cloud API Demo
    </title>

<?php
$img = file_get_contents( 'a.jpeg'); 
  
// Encode the image string data into base64 
$data = base64_encode($img); 
  
// Display the output 
echo $data; 
?> 


<head>
        <script>
        // Open connection to api.openalpr.com
        var secret_key = "sk_7e23fe78c0d325918f2c9f08";
        var url = "https://api.openalpr.com/v2/recognize_bytes?recognize_vehicle=1&country=us&secret_key=" + secret_key;
        var xhr = new XMLHttpRequest();
		
		var data = "<?php echo $data ?>";
        xhr.open("POST", url);

        // Send POST data and display response
		xhr.send("data");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                document.getElementById("response").innerHTML = xhr.responseText;
            } else {
                document.getElementById("response").innerHTML = "Waiting on response...";
            }
        }
        </script>
</head>

    <body>
        JSON response: <p id="response"></p><br>
    </body>
</html>