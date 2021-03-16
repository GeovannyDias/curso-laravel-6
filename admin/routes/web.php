<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// Route::get('/usuarios', 'UserController@index'); // método index
Route::resource('/usuarios', 'UserController'); // ->middleware('auth'); // "resource" hace referencia a todos los métodos del controlador
// ->middleware('auth') paraque solicite iniciar sesión (Forma 1)

// Rutas para la seccion notas
Route::get('/notas/todas', 'NotasController@todas');
Route::get('/notas/favoritas', 'NotasController@favoritas');
Route::get('/notas/archivadas', 'NotasController@archivadas');