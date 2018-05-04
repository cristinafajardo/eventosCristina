<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style type="text/css">
        #map_canvas     { width: 990px; height: 500px; }
    </style>
   <script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"> </script> 
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0x2gX3yarU-p7rLGjj7JUVBpxgSdmInk"></script>
    <script type="text/javascript">
        var map = null;
        var infoWindow = null;
        function openInfoWindow(marker) {
            var markerLatLng = marker.getPosition();
            infoWindow.setContent([
                '<strong>La posicion del marcador es:</strong><br/>',
                markerLatLng.lat(),
                ', ',
                markerLatLng.lng(),
                '<br/>Arrastrame y hacé click para fijar la posición del evento.'
            ].join(''));
            infoWindow.open(map, marker);
            var latitud = marker.position.lat();
    var longtitud = marker.position.lng();
    document.getElementById('lat').defaultValue = latitud;
    document.getElementById('long').defaultValue = longtitud;
        }
        function initialize() {
            var myLatlng = new google.maps.LatLng(-41.133472,-71.310278);
            var myOptions = {
              zoom: 13,
              center: myLatlng,
              mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map($("#map_canvas").get(0), myOptions);
            infoWindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
                position: myLatlng,
                draggable: true,
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
    <div id="map_canvas"></div>
</body>
</html>