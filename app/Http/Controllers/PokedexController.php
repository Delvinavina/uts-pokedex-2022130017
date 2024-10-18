<?php

namespace App\Http\Controllers;

class PokedexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $pokemon = pokemon::paginate(9);
        return view('pokedex', compact('pokemon'));
    }
}