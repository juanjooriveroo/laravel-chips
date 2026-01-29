<?php

namespace App\Http\Controllers;

use App\Models\Meme;
use App\Models\User;
use Illuminate\Http\Request;

class MemeController extends Controller
{
    public function index()
    {
        $memes = Meme::orderByDesc('fecha_subida')->get();

        return view('feed', compact('memes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'meme_url' => 'required|url|max:255',
            'explicacion' => 'required|string|max:255',
        ], [
            'meme_url.required' => 'Por favor, proporciona la URL del meme.',
            'meme_url.url' => 'La URL del meme no es válida.',
            'explicacion.required' => 'Por favor, escribe una explicación.',
            'explicacion.max' => 'La explicación debe tener 255 caracteres o menos.',
        ]);

        // Use authenticated user to create the meme
        if (! auth()->check()) {
            return redirect('/login');
        }

        auth()->user()->memes()->create([
            'meme_url' => $validated['meme_url'],
            'explicacion' => $validated['explicacion'],
            'fecha_subida' => now(),
        ]);

        return redirect('/')->with('success', '¡Meme subido!');
    }

    public function edit(Meme $meme)
    {
        $this->authorize('update', $meme);

        return view('memes.edit', compact('meme'));
    }

    public function update(Request $request, Meme $meme)
    {
        $validated = $request->validate([
            'meme_url' => 'required|url|max:255',
            'explicacion' => 'required|string|max:255',
        ]);

        $this->authorize('update', $meme);

        $meme->update($validated);

        return redirect('/')->with('success', 'Meme actualizado.');
    }

    public function destroy(Meme $meme)
    {
        $this->authorize('delete', $meme);

        $meme->delete();

        return redirect('/')->with('success', 'Meme eliminado.');
    }
}
