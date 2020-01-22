<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/login',function(){
    return view('login');
});

Route::post('/login', 'userController@login');

Route::post('/register','userController@storeUser');

Route::get('/register',function()
{
    return view('registrarse');
});

Route::post('/search','mainController@search');

Route::post('/services/store','servicesController@store');

Route::get('/services/create',function(){
    return view('crearServicio');
});