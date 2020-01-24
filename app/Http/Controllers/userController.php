<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class userController extends Controller
{
    
    public function login(Request $request)
    {
        $datosUsuario = $request->only('email','password');
        if(Auth::attempt($datosUsuario))
        {
            dd('hola');
            return redirect('perfil');
        }
        else
        {
            dd('chau');
            $error = "Datos incorrectos";
            return redirect('login')->with('error',$error);
        }
    }

    public function storeUser(Request $request)
    {
        $user = new User($request->All());
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/');
    }

    

    
}
