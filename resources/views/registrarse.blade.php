<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Registrarse</title>
</head>
<body>
    <h3>Registarse</h3>
<form action="{{action('userController@storeUser')}}" method="POST">
    {{csrf_field()}}
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <input type="submit" value="Guardar">
</form>
</body>
</html>