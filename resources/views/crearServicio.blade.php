<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    
    <title>Document</title>
</head>
<body>
    <h3>Crear nuevo servicio</h3>
<form action="{{'servicesController@store'}}" method="POST">
    <label for="title">Titulo</label>
    <br>
    <input type="text" name="title" id="title">
    <br>
    <label>Coordenadas</label>
    <br>
    <label for="lat">Latitud</label>
    <input type="number" name="lat" id="lat">
    <label for="lon">Longitud</label>
    <input type="number" name="lon" id="lon">
    <br>
    <label for="description">Descripcion</label>
    <br>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
    <br>
    <label for="active">Activo</label>
    <input type="checkbox" name="active" id="active">
    <label for="inactive">Inactivo</label>
    <input type="checkbox" name="inactive" id="inactive">
    <br><br>
    <input type="submit" value="Guardar">
</form>
<label for="">Buscar direccion </label>
<input type="text" name="" id="direccion">
<button id="buscar">Buscar direccion</button>

<div class="col-md-12 col-sm-12">
    <input type="text" style="width:400px" id="coords" />
 <div>
 <div class="col-md-12 col-sm-12" id="map-canvas" style="height:200px;"></div>


 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeYqa3zn6HNHm26WQyZhkZ5567ybTeYYQ"></script>
<script>
    var map;
var geocoder;
var direccion = document.getElementById("direccion");
var button = document.getElementById("buscar");
var lat = document.getElementById('lat');
var lon = document.getElementById('lon');
   
function initialize() { 


    
    map = new google.maps.Map(document.getElementById('map-canvas'), {
     zoom: 3,
     center: {lat: -10, lng: -60}
     });


   

			
      button.addEventListener('click',function(event) {
     // document.querySelector("#coords").value = this.getPosition().toString();
     geocoder = new google.maps.Geocoder();
     geocoder.geocode({'address': direccion.value},function(resultado,status)
     {
        var result = resultado[0].geometry.location;
         map.zoom = 17;
        map.setCenter(result);
        lat.value = result.lat();
        lon.value = result.lng();
        var marker=new google.maps.Marker({
      position:result, 
      map:map, 
      draggable:true
   });
       
     })
   });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

</body>
</html>

