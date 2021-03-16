@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-sm-9">
                <!-- Displaying The Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        Actualizar Información:
                    </div>
                    <div class="card-body">

                        <!-- direccionamos a la ruta /usuarios y ejecutamos el metodo POST -->
                        <form action="{{ route('usuarios.update', $user->id) }}" method="POST">
                            <!-- method Directiva laravel / método PATCH que sirve para actualizar los datos con el metodo update() -->
                            @method('PATCH')
                            <!-- Crea un Token -->
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                    placeholder="Ingresa un nombre">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                    placeholder="Ej: usuario@dominio.com" readonly> <!-- disabled readonly -->
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            {{-- <button type="reset" class="btn btn-danger">Cancelar</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
