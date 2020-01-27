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

    <div class="container">
        <div class="col">

          <h3>Administración de servicios</h3>
          <a href="/services/create" class="btn btn-primary">Crear nuevo servicio</a>
          <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Activo</th>
                    <th scope="col">Acciones</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @php $n=1; @endphp
                    @foreach ($data as $item)
                    
                     <tr>
            
                        <th scope="row"> {{$n}}</th>
                        <td>{{ $item->service_title }}</td>
                        <td>{{$item->service_description }}</td>
                        <td>{{$item->active }}</td>
                     <td><a href="{{action('servicesController@modifyService',$item->id)}}"><span class="badge badge-warning">Modificar</span></a></td>
                        <td><a href="{{action('servicesController@deleteService',$item->id)}}"><span class="badge badge-danger">Eliminar</span></a></td>
                      
                      </tr>
                    
                
                      @php $n++; @endphp
                    @endforeach
            
                </tbody>
              </table>
        </div>
    </div>

    @include('partials/footer')

 @include('partials/bootstrapScript')

</body>
</html>