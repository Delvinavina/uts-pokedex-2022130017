<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PokedexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $pokemon = pokemon::paginate(9);
        return view('pokedex', compact('pokemon'));
    }
}
