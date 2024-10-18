<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;

class PokedexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $pokemon = Pokemon::paginate(9);

        return view('pokedex', compact('pokemon'));
    }
}