<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // importar el modelo User

class UserController extends Controller
{
    // mostrar una lista de los registros
    public function index(){
        $users = User::all(); // Get all users
        // dd($users);
        return view('usuarios', ['users' => $users]);
    }

    // Mostrar el formulario para crear un nuevo registro
    public function create(){
        //
    }

    // Se almacenan los registro recien creados de "create()" en la BD
    public function store(){
        //
    }

    // Mostramos un registro especifico
    public function show(){
        //
    }

    // Muestra el formulario con los datos a editar de un registro especifico
    public function edit(){
        // 
    }

    // Nos ayuda actualizar un registro o muchos registros en la BD
    public function update(){
        // 
    }

    // Nos ayuda a eliminar un registro especifico de la BD
    public function destroy(){
        //
    }
}
