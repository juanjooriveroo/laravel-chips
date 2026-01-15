<?php

namespace App\Http\Controllers;

use App\Models\Meme;
use Illuminate\Http\Request;

class MemeController extends Controller
{
    public function index()
    {
        $memes = Meme::with('user')
            ->latest('fecha_subida')
            ->take(50)
            ->get();

        return view('feed', ['memes' => $memes]);
    }
}
