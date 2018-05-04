<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style type="text/css">
        #map_canvas 
        { width: 470px; height: 500px; }
    </style>
   <script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"> </script> 
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0x2gX3yarU-p7rLGjj7JUVBpxgSdmInk"></script>
    <script type="text/javascript">
        var map = null;
        
        function initialize() {
           var a =document.getElementsByName("lat")[0].value;
           var b =document.getElementsByName("long")[0].value;
           var myLatlng = new google.maps.LatLng(a,b);
           var myOptions = {
              zoom: 16,
              center: myLatlng,
              mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map($("#map_canvas").get(0), myOptions);
            infoWindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title:"Aquí será el evento"
            });
            google.maps.event.addListener(marker, 'click', function(){
                openInfoWindow(marker);
            });
            
        }

        $(document).ready(function() {
            initialize();
        });
    </script>
</head>
<body>
    <div id="map_canvas" ></div>
</body>
</html>