<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    
    <title>Document</title>
</head>
<body>
    <h3>Crear nuevo servicio</h3>
<form action="{{action('servicesController@store')}}" method="POST">
    {{ csrf_field() }}
    <label for="service_title">Titulo</label>
    <br>
    <input type="text" name="service_title" id="service_title">
    <br>
    <label>Coordenadas</label>
    <br>
    <label for="service_lat">Latitud</label>
    <input type="number" name="service_lat" step="0.0000000000001" id="service_lat">
    <label for="service_long">Longitud</label>
    <input type="number" name="service_long" step="0.0000000000001" id="service_long">
    <br>
    <label for="service_description">Descripcion</label>
    <br>
    <textarea name="service_description" id="service_description" cols="30" rows="10"></textarea>
    <br>
    <label for="active">Activo</label>
    <input type="checkbox" name="active" id="active">
    <br><br>
    <input type="submit" value="Guardar">
</form>
<label for="">Buscar direccion </label>
<input type="text" name="" id="direccion">
<button id="buscar">Buscar direccion</button>


 <div class="col-md-12 col-sm-12" id="map-canvas" style="height:200px;"></div>


 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeYqa3zn6HNHm26WQyZhkZ5567ybTeYYQ"></script>
<script>
    var map;
var geocoder;
var direccion = document.getElementById("direccion");
var button = document.getElementById("buscar");
var lat = document.getElementById('service_lat');
var lon = document.getElementById('service_long');
var marker;

function initialize() { 


    
    map = new google.maps.Map(document.getElementById('map-canvas'), {
     zoom: 3,
     center: {lat: -10, lng: -60}
     });


     marker=new google.maps.Marker({
         position: map.getCenter(),
      map:map, 
      draggable:true
   });
   google.maps.event.addListener(marker,'dragend',function(event) {
    lat.value = marker.getPosition().lat().toFixed(8);
    lon.value = marker.getPosition().lng().toFixed(8);
   ;
   });
			
      button.addEventListener('click',function(event) {
     geocoder = new google.maps.Geocoder();
     geocoder.geocode({'address': direccion.value},function(resultado,status)
     {
         var result = resultado[0].geometry.location;
         map.zoom = 17;
        map.setCenter(result);
     
        lat.value = result.lat().toFixed(8);
        lon.value = result.lng().toFixed(8);
        marker.setPosition(result);
       
     });
   });




}


google.maps.event.addDomListener(window, 'load', initialize);


</script>

</body>
</html>

