<head>
    <style>
      html, body {
        height: 80%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        width: 75%;
        
      }
.controls {
  margin-top: 10px;
  border: 1px solid transparent;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  height: 32px;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

#pac-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  margin-left: 12px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 300px;
}

#pac-input:focus {
  border-color: #4d90fe;
}

.pac-container {
  font-family: Roboto;
}

#type-selector {
  color: #fff;
  background-color: #4d90fe;
  padding: 5px 11px 0px 11px;
}

#type-selector label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}

    </style>
    <title>Places Searchbox</title>
    <style>
      #target {
        width: 345px;
      }
    </style>
  </head>
    <label for="map" class="col-lg-2">      </label>
    <!-- <input id="pac-input" class="controls" type="text" placeholder="Introduzca direccion"> 
        <div id></div>
    -->
    <div id="map" class="col-md-10"></div>
    <script>


// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.
 var infoWindow = null;
function iniciarMapa()
{
  initAutocomplete();
  addMarker(location);
}
function initAutocomplete()
{
    var map = new google.maps.Map(document.getElementById('map'), 
    {
      center: {lat: -41.133472, lng: -71.310278},
      zoom: 15,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    
    });

    //AGREGO UN MARKER -------------------------------------------
    var marker = new google.maps.Marker(
    {
      position: {lat: -41.133472, lng: -71.310278},
      map: map,
      draggable:true
    });
    //OBTENER LATITUD Y LONGITUD DEL MARKER -----------------------
    var latitud = marker.position.lat();
    var longtitud = marker.position.lng();
    document.getElementById('lat').defaultValue = latitud;
    document.getElementById('long').defaultValue = longtitud;
}

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0x2gX3yarU-p7rLGjj7JUVBpxgSdmInk&libraries=places&callback=iniciarMapa"
         async defer></script>
<!-- var map = null;
var infoWindow = null;
 
function openInfoWindow(marker) {
    var markerLatLng = marker.getPosition();
    infoWindow.setContent([
        '&lt;b&gt;La posicion del marcador es:&lt;/b&gt;&lt;br/&gt;',
        markerLatLng.lat(),
        ', ',
        markerLatLng.lng(),
        '&lt;br/&gt;&lt;br/&gt;Arr&amp;aacute;strame y haz click para actualizar la posici&amp;oacute;n.'
    ].join(''));
    infoWindow.open(map, marker);
}
 
function initialize() {
    var myLatlng = new google.maps.LatLng(20.68017,-101.35437);
    var myOptions = {
      zoom: 13,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
 
    map = new google.maps.Map($(&quot;#map_canvas&quot;).get(0), myOptions);
 
    infoWindow = new google.maps.InfoWindow();
 
    var marker = new google.maps.Marker({
        position: myLatlng,
        draggable: true,
        map: map,
        title:&quot;Ejemplo marcador arrastrable&quot;
    });
 
    google.maps.event.addListener(marker, 'click', function(){
        openInfoWindow(marker);
    });
}
 
$(document).ready(function() {
    initialize();
}); -->