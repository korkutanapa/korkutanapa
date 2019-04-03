<!DOCTYPE html>
<html>
<head>
    <title>GEOIP DB - jQuery example</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
    <div>Country: <span id="country"></span>
    <div>Street: <span id="street"></span>
    <div>City: <span id="city"></span>
    <div>Latitude: <span id="latitude"></span>
    <div>Longitude: <span id="longitude"></span>
    <div>IP: <span id="ip"></span>
    <script>
        $.ajax({
            url: "https://geoip-db.com/jsonp",
            jsonpCallback: "callback",
            dataType: "jsonp",
            success: function( location ) {
                $('#country').html(location.country_name);
                $('#street').html(location.street);
                $('#city').html(location.city);
                $('#latitude').html(location.latitude);
                $('#longitude').html(location.longitude);
                $('#ip').html(location.IPv4);  
            }
        });     
    </script>
</body>
</html>