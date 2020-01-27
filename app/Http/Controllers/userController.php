<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class userController extends Controller
{
    //funcion de login. se validan los datos. si son correctos se redirecciona al panel de administracion de servicios

    public function login(Request $request)
    {
        $datosUsuario = $request->only('email','password');
        //se validan los datos mediante el Auth facade de laravel
        if(Auth::attempt($datosUsuario))
        {
            //se pasa el id del usuario a la session.
            session(['user_id'=>Auth::user()->id]);
            return redirect('/services');
        }
        else
        {
            
            $error = "Usuario y/o contraseña incorrectos...";
            return view('login')->with('error',$error);
        }
    }
//funcion que crea un nuevo usuario a partir de los datos recibidos del form y se guardan en la DB
//no está tenido en cuenta si no se puede conectar a la DB
    public function storeUser(Request $request)
    {
        $user = new User($request->All());
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/');
    }
    //funcion que desloguea al usuario y borra los datos de session.
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect('/');
    }

    

    
}
