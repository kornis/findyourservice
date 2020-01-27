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

    <div class="container main-container">
        <div class="col">
        <form method="post" action="{{action('servicesController@saveUpdates',$service->id)}}">

            {{ csrf_field() }}
            <div class="form-group">
                <label for="service_title">Título</label>
                <input type="text" name="service_title" id="service_title" class="form-control" value="{{$service->service_title}}" required>
            </div>
            <div class="form-group">
                <label for="service_description">Descripción</label>
                <textarea name="service_description" id="service_description" class="form-control" cols="30" rows="10" required>{{$service->service_description}}</textarea>
            </div>
            <div class="form-group">
                <label for="active">Activo</label>
                <input type="checkbox" name="active" id="active">
            </div>
            <button type="submit" class="btn btn-primary">Guardar Datos</button>
        </form>
        </div>
    </div>

    @include('partials/footer')
    @include('partials/bootstrapScript')
</body>
</html>