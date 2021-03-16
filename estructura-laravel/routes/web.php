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
    return view('welcome');
});

// ruta pasando parametros por URL
Route::get('id/{id}', function ($id) {
    return 'Welcome id: '.$id;
});

// ruta pasando parámetros opcional [?] por URL
Route::get('usuario/{name?}', function ($name = null) {
    return 'Welcome: '.$name;
});

// ruta pasando parametros por URL // Utilizando un controlador para retornar datos // show() metodo
Route::get('user1/{id}', 'userController@show');

// pasar datos a una vista (principa) por una ruta

// Route::get('/', function (){
//     return view('users', ['name' => 'Geo']);
//     // return view('users')->with('name', 'Geo 2');
// });

// pasar datos a la vista desde un controlador saluda() metódo

// Route::get('/', 'userController@saluda');


// ruta pasando parametros por URL // Utilizando un controlador para retornar datos // mostrar() metodo
// mostrar datos de BD
Route::get('user/{name}', 'userController@mostrar');
// Route::get('user/{id}', 'userController@buscar');
