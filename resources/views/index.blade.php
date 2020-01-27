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

<div class="container main-section">
    <div class="alert alert-warning alert-dismissible fade show"  role="alert">
        <p id="error"></p>
    @if(isset($err))<p id="notfound">{{$err}}</p>@endif
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<form action="{{action('servicesController@searchService')}}" method="POST">
    {{ csrf_field() }}
    
    <div class="form-row">
    <div class="form-group col-sm-8 col-lg-9">
    <label for="busqueda">Buscar servicios</label>
    <input type="text" name="busqueda" id="busqueda" class="form-control">
    </div>
    <div class="form-group col-sm-4 col-lg-3">
        <label for="radius">Radio de busqueda</label>
    <select name="radius" id="radius" class="form-control">
      <option value="2">2km</option>
    <option value="10">10km</option>
    <option value="100">100km</option>
    <option value="any">Anywhere</option></select>
    </div>
    </div>

    <input type="number" hidden name="local_lat" step="0.0000000000001" id="local_lat" class="form-control">

    <input type="number" hidden name="local_long" step="0.0000000000001" id="local_long" class="form-control">

    <button type="submit" class="btn btn-primary">Buscar</button>
</form>
</div>

<!--  hasta aqui -->

@if (isset($data))
@if(isset($data[0]))
<div class="container table">
    <div class="col">
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titulo</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Distancia</th>
      </tr>
    </thead>
    <tbody>
        @php $n=1; @endphp
        @foreach ($data as $item)
        
         <tr style="transform: rotate(0);" class="table-link">

            <th scope="row"><a class="stretched-link" href="{{action("servicesController@showService",$item->id)}}"> {{$n}}</a></th>
            <td>{{ $item->service_title }}</td>
            <td>{{$item->service_description }}</td>
            <td>{{$item->distance}} Km</td>
          
          </tr>
        
    
          @php $n++; @endphp
        @endforeach

    </tbody>
  </table>
    </div>
</div>
@else
<div class="container">
  <div class="col">
<h3>No se encontraron servicios dentro del radio seleccionado</h3>    
  </div>
</div>
@endif
@endif


@include('partials/footer')

 @include('partials/bootstrapScript')

<script>
    
    window.onload =function geoFindMe() {
  var output = document.getElementById("error");
  var local_lat = document.getElementById("local_lat");
  var local_long = document.getElementById("local_long");
  var notfound = document.getElementById("notfound");
  var per = document.getElementById('permission');
  if (!navigator.geolocation){
    output.innerHTML = "<p>Tu navegador no soporta Geolocalización.</p>";
    return;
  }

  function success(position) {
    var latitude  = position.coords.latitude;
    var longitude = position.coords.longitude;
    output.parentNode.setAttribute('class','alert alert-primary alert-dismissible fade show');
    output.innerHTML = '<p>Tu latitud es ' + latitude + '° <br>Tu longitud es ' + longitude + '°</p>';
    
   local_lat.value = latitude.toFixed(8);
   local_long.value = longitude.toFixed(8);
   notfound.innerHTML = "";
   per.innerHTML = "";
  };

  function error() {
    output.parentNode.setAttribute('class','alert alert-danger alert-dismissible fade show');
    output.innerHTML = "No se pudo obtener su localización, intente la busqueda mas tarde...";
  };

  output.innerHTML = "<p>Localizando…</p>";

  navigator.geolocation.getCurrentPosition(success, error);
}

 
    </script>
</body>
</html>