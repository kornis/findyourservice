<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->busqueda;
        dd($search);
    }
}
