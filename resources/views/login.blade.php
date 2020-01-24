<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row logo-row">
            <div class="logo">
                <a href="/"><img src="/images/logo-tienda.png" alt="" srcset=""></a>
            </div>
        </div>
    </div>


    <div class="container login-container">
        <div class="row main-row">
            <div class="col-sm-12 login">
                <img src="/images/default.png" class="login-img"alt="">
                @if(isset($error)){
                    {!! error !!}
                }
                @endif
            <form method="POST" action="{{action('userController@login')}}">
                {{csrf_field()}}
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
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

    <footer class="container-fluid">

        <div class="row footer2row">
            <div class="">
                <span style="color: black; font-size: 10px;"><i class="far fa-registered"></i> FindYourService.com</span>
            </div>
        </div>

    </footer>

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