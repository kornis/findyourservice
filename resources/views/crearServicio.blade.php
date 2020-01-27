<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="WBfz1bzZpX_goZKsi2H8z78mOqBApxp-PTEwKLUs9bk" />
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
<link rel="stylesheet" href="{{asset("css/style.css")}}">
<link rel="stylesheet" href="{{asset("css/footer.css")}}">
    <title>Find Your Service | encontrá lo que buscas</title>
</head>
<body>

    @include('partials/navbar')

    <div class="container main-content">
        <div class="col">
            <h3>Crear nuevo servicio</h3>
<form action="{{action('servicesController@store')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
    <label for="service_title">Titulo</label>
    <input type="text" name="service_title" id="service_title" class="form-control" required>
    </div>

    <div class="form-group">
    <label for="service_description">Descripcion</label>
    <textarea name="service_description" id="service_description" cols="28" rows="7" class="form-control"  required></textarea>
    </div>
    <div class="form-group">
    <label for="active">Activo</label>
    <input type="checkbox" name="active" id="active">
    </div>

    
        <div class="form-row dir">
            <div class="col">
        <label for="direccion">Buscar direccion </label>
        <input type="text" name="service_dir" id="direccion" class="form-control"  required>
        
            </div>
            <div class="col boton">
        <span id="buscar" class="btn btn-primary">Buscar direccion</span>
            </div>
    </div>
        <div class="col-md-12 col-sm-12" id="map-canvas" style="height:200px;"></div>

    <input type="text" hidden name="map_link" id="map_link">
    <div class="form-group">
        <label>Coordenadas</label>
        <label for="service_lat">Latitud</label>
        <input type="number" name="service_lat" step="0.0000000000001" id="service_lat" class="form-control"  required>
        <label for="service_long">Longitud</label>
        <input type="number" name="service_long" step="0.0000000000001" id="service_long" class="form-control"  required>
        </div>
    <input type="submit" class="btn btn-primary" value="Guardar">
        </div>
    
</form>
        </div>
</div>




@include('partials/footer')
@include('partials/bootstrapScript')

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeYqa3zn6HNHm26WQyZhkZ5567ybTeYYQ"></script>
<script>
    var map;
var geocoder;
var direccion = document.getElementById("direccion");
var button = document.getElementById("buscar");
var lat = document.getElementById('service_lat');
var lon = document.getElementById('service_long');
var marker;
var map_link = document.getElementById('map_link');

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
    map_link.value = "https://maps.googleapis.com/maps/api/staticmap?center="+direccion.value+"&zoom=17&size=600x300&markers=color:red%7Clabel:S%7C%7C"+lat.value+","+lon.value+"&key=AIzaSyCeYqa3zn6HNHm26WQyZhkZ5567ybTeYYQ"

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
        map_link.value = "https://maps.googleapis.com/maps/api/staticmap?center="+direccion.value+"&zoom=17&size=600x300&markers=color:red%7Clabel:S%7C%7C"+lat.value+","+lon.value+"&key=AIzaSyCeYqa3zn6HNHm26WQyZhkZ5567ybTeYYQ"

     });
   });




}


google.maps.event.addDomListener(window, 'load', initialize);


</script>

</body>
</html>

