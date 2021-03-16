@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>
            Lista de usuarios registrados:
            <a href="usuarios/create">
                <button type="button" class="btn btn-success float-right">
                    <span class="fas fa-user-plus"></span> Agregar Usuario
                </button>
            </a>
        </h2>
        <h6>
            @if ($search)
                <div class="alert alert-primary" role="alert">
                    Los resultados para tu busqueda "{{ $search }}" son:
                </div>
            @endif
        </h6>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST">
                                <!-- Ver -->
                                <a href="{{ route('usuarios.show', $user->id) }}">
                                    <button type="button" class="btn btn-secondary">
                                        <span class="fas fa-user"></span>
                                    </button>
                                </a>
                                <!-- Editar -->
                                <a href="{{ route('usuarios.edit', $user->id) }}">
                                    <button type="button" class="btn btn-warning">
                                        <span class="fas fa-user-edit"></span>
                                    </button>
                                </a>

                                <!-- Eliminar - Metodo Submit Ejecuta el Formulario -->
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <span class="fas fa-user-times"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Center Paginator-->
        <div class="row">
            <div class="mx-auto">
                {{ $users->links() }}
            </div>
        </div>
    </div>

@endsection
