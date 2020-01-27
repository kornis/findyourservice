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

    <div class="container main-content d-flex justify-content-center">
        <div class="col-sm-8">
            @if(isset($service))
            <div class="card">
                <div class="card-body" style="color: black !important">
                <h5 class="card-title" >Titulo: {{$service->service_title}}</h5>
                <p class="card-text">Descripcion: {{$service->service_description}}</p>
                <p class="card-text">Dirección: {{$service->service_dir}}</p>
                </div>
            <img src="{{$service->map_link}}" class="card-img-top" width="100px !important" alt="">
              </div>
              @else
              <h1>Articulo no encontrado</h1>
              @endif   
              <a href="/" class="btn btn-primary">Volver al buscador</a>
        </div>
        
    </div>
   

    @include('partials/footer')
    @include('partials/bootstrapScript')
</body>
</html>