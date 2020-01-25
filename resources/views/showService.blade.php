<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="google-site-verification" content="WBfz1bzZpX_goZKsi2H8z78mOqBApxp-PTEwKLUs9bk" />
        <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
        <title>Find Your Service | encontrá lo que buscas</title>
    </head>
<body>
    @include('partials/navbar');

    <div class="container main-content">
        <div class="row">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">{{$service->service_title}}</h5>
                <p class="card-text">{{$service->service_description}}</p>
                </div>
            <img src="{{$service->map_link}}" class="card-img-top" alt="">
              </div>
        </div>
    </div>
</body>
</html>