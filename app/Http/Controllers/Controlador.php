<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controlador extends Controller
{
    public function index(){
        $datos = "titulo";
        $datos_modelo = [
            [
                'meme' => "Mujer al poder",
                'usuario' => "Juanjo"
            ],
            [
                'meme' => "A bailar",
                'usuario' => "Pepe"
            ]
        ];

        return view('ejemplo_mvc', ['nombre_titulo' => $datos, 'datos_modelo' => $datos_modelo]);
    }
}
