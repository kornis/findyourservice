<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="WBfz1bzZpX_goZKsi2H8z78mOqBApxp-PTEwKLUs9bk" />
    
    <title>Find Your Service | encontrá lo que buscas</title>
</head>
<body>
<form action="{{action('mainController@search')}}" method="POST">
    {{ csrf_field() }}
    <label for="busqueda">Buscar servicios</label>
    <input type="text" name="busqueda" id="busqueda">
    <button type="submit">Buscar</button>
</form>
</body>
</html>