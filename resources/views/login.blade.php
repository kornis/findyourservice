<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="{{asset("css/footer.css")}}">
    <title>Find Your Service | encontrá lo que buscas</title>
</head>
<body>
    <header class="container d-flex justify-content-center">
        <div class="col-sm-8">

                <h2>Find your Service</h2>

        
    </div>
</header>
    <div class="container login-container">
        <div class="row main-row">
 
                <div class="col-sm-12 login">
                <img src="{{asset("images/default.png")}}" class="login-img"alt="">
     
            <form method="POST" action="{{action('userController@login')}}">
                {{csrf_field()}}
                    <h4>INICIAR SESIÓN</h4>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    @if(isset($error))
                    <div class="alert alert-danger" role="alert">
                        {{$error }}
                      </div>
                  
                
                @endif
                    
                    <button type="submit" class="btn btn-primary submit">Ingresar</button>
                </form>
            </div>
            <div class="col singup">
            <div class="registrarse">
                <span><small>No estás registrado? Hacé click <a href="/register"> aquí </a></small></span>
            </div>
        </div>
        </div>
    </div>

    @include('partials/footer')

 


    <script>
        
        
        var img = document.querySelector(".login-img");
      function resize()
      {
        var w = document.querySelector(".login").clientWidth;
        img.style.left = ((w/2)-130+65)+"px";
      }
        window.addEventListener("resize", resize);
      resize();

    </script>
    
</body>
</html>