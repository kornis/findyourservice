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
   
})->name('index');

Route::get('/fail/{err}', function ($err) {

    return view('index')->with('err',"No tiene permisos para ingresar en esta sección");
   
})->name('index_err');

Route::get('/login',function(){
    return view('login');
})->name('login')->middleware('login');

Route::get("/logout",'userController@logout')->middleware('auth');

Route::post('/login', 'userController@login');

Route::post('/register','userController@storeUser');

Route::get('/register',function()
{
    return view('registrarse');
})->middleware('login');

Route::post('/','servicesController@searchService'); 

Route::post('/services/store','servicesController@store')->middleware('auth');

Route::get('/services/create',function(){
    return view('crearServicio');
})->middleware(['auth','checkUser']);

Route::get('/services','servicesController@getAllServices')->name('services')->middleware(['auth','checkUser']);

Route::get('/service/{id}',"servicesController@showService");

Route::get('/service/modificar/{id}',"servicesController@modifyService")->middleware(['auth','checkUser']);

Route::post('/service/modificar/{id}','servicesController@saveUpdates')->middleware(['auth','checkUser']);

Route::get('/service/delete/{id}','servicesController@deleteService')->middleware(['auth','checkUser']);