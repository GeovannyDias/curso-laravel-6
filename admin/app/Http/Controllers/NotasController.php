<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotasController extends Controller
{
    public function todas(){
        return view('notas.todas');
    }

    public function favoritas(){
        return view('notas.favoritas');
    }

    public function archivadas(){
        return view('notas.archivadas');
    }
}
