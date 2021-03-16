@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-sm-9">
                <div class="jumbotron">
                    <h1 class="display-4">{{ $user->name }}</h1>
                    <p class="lead">{{ $user->email }}</p>
                    <hr class="my-4">
                    <p class="lead">
                        <a class="btn btn-secondary btn-lg" href="{{ url('usuarios') }}" role="button">
                            <span class="fas fa-angle-double-left"></span>
                            Regresar
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
