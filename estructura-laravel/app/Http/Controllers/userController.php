<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{
    public function show($id){
        return 'UserID '.$id; 
    }

    // parametro a vista
    public function saluda(){
        // return view('users', ['name' => 'Geo']);
        return view('users')->with('name', 'Geo 2021');
    }

    // si es la primera vez que conecta al BD reinicie el servidor
    // funcion mostrar posando el parametro name (nombre del usuario)
    public function mostrar($name){
        // conexion a la BD, haciendo referencia la table "users", donde el name = $name y obtenermos el primer resutado de la BD
        // $user = \DB::table('users')->where('name', $name)->first();
        // dd($user); // imprime los datos en pantalla
        // if (!$user) {
        //     abort(404); // si no existe datos
        // }

        // Consulta usando el model ORM Eloquent
        // :: se denomina operador de resolucion de ambito (Nos indica que la funcion estamos definiendo le pertenese a la clase user)
        // $user = User::where('name', $name)->first();
        // $user = User::where('name', $name)->firstOrFail();

        // return view('users', ['user' => $user]);
        return view('users', ['user' => User::where('name', $name)->firstOrFail()]);
    }

    public function buscar($id){
        // conexion a la BD, haciendo referencia la table "users", donde el name = $name y obtenermos el primer resutado de la BD
        // $user = \DB::table('users')->where('name', $name)->first();
        // dd($user); // imprime los datos en pantalla
        // if (!$user) {
        //     abort(404); // si no existe datos
        // }

        // Consulta usando el model ORM Eloquent
        // :: se denomina operador de resolucion de ambito (Nos indica que la funcion estamos definiendo le pertenese a la clase user)
        // $user = User::where('name', $name)->first();
        // $user = User::where('name', $name)->firstOrFail();

        // return view('users', ['user' => $user]);
        return view('users', ['user' => User::where('id', $id)->firstOrFail()]);
    }
}
