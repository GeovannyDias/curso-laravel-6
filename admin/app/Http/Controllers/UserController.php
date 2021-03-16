<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // importar modelo
use App\Http\Requests\UserFormRequest;

class UserController extends Controller
{
    // permitir iniciar sesión creando un constructor
    public function __construct(){
        $this->middleware('auth');
    }


    // public function index() {
    //     $users = User::all(); // Get all users
    //     // dd($users);
    //     return view('usuarios.index', ['users' => $users]);
    // }

    public function index(Request $request) {
        if ($request) {
            $query = trim($request->get('search'));
             // busque desde el principio de la cadena $query (de principio o al final)
            $users = User::where('name', 'LIKE', '%' . $query . '%')
            ->orderBy('id', 'asc')
            // ->get();
            // ->simplepaginate(5); // nos devuelve una instancia de la clase Paginator
            ->paginate(5); // nos devuelve una instancia de la clase LengthAwarePaginator
            // dd($users); // si 'search' esta vacia la variable $query="" y despliega todos los usuarios
            return view('usuarios.index', ['users' => $users, 'search' => $query]); // se pasa search como query para usar como dato en la siguiente vista
        }
        // $users = User::all(); // Get all users
        // // dd($users);
        // return view('usuarios.index', ['users' => $users]);
    }


    public function create() {
        return view('usuarios.create');
    }


    public function store(Request $request) {
        $user = new User(); // objeto del modelo user
        // name="name", name="email", name="password" del input
        $user->name = request('name'); // hacemos referencia a la columna donde se guardara ese dato
        $user->email = request('email');
        $user->password = request('password');
        $user->save(); // guardar datos
         // dd($user->name);
        return redirect('/usuarios');
    }


    // TEST - Validacion - Consultar
    // public function store(UserFormRequest $request) {
    //     $user = new User(); // objeto del modelo user
    //     // name="name", name="email", name="password" del input
    //     $user->name = $request->get('name'); // hacemos referencia a la columna donde se guardara ese dato
    //     $user->email = $request->get('email');
    //     $user->password = $request->get('password');
    //     $user->save(); // guardar datos
    //      // dd($user->name);
    //     return redirect('/usuarios');
    // }

 
    public function show($id)
    {
        return view('usuarios.show', ['user' => User::findOrFail($id)]); 
    }


    public function edit($id)
    {
        // Enviar datos como user, y sera encontrado en el modelo con el $id
        return view('usuarios.edit', ['user' => User::findOrFail($id)]); 
    }


    public function update(UserFormRequest $request, $id)
    {
        $user = User::findOrFail($id); // Buscar el user con el id
        $user->name = $request->get('name'); // usar $request para mas adelante validar los campor // obtenemos los datos desde el formulario
        $user->email = $request->get('email');
        $user->update(); // actualiza los datos
        return redirect('/usuarios');
    }

    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/usuarios');
    }
}
