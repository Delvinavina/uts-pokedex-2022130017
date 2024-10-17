<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokemon = pokemon::all();
        return view('pokemon.index', compact('pokemon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = [
            'Grass', 'Fire', 'Water', 'Bug', 'Normal', 'Poison',
            'Electric', 'Ground', 'Fairy', 'Fighting', 'Psychic',
            'Rock', 'Ghost', 'Ice', 'Dragon', 'Dark', 'Steel', 'Flying'
        ];
        return view('pokemon.create', compact('type'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePokemonRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('pokemon_photo', 'public');
            $validated['photo'] = $path;
        }

        pokemon::create($validated);

        return redirect()->route('pokemon.index')->with('success', 'Pokemon created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(pokemon $pokemon)
    {
        return view('pokemon.show', compact('pokemon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pokemon $pokemon)
    {
        $type = [
            'Grass', 'Fire', 'Water', 'Bug', 'Normal', 'Poison',
            'Electric', 'Ground', 'Fairy', 'Fighting', 'Psychic',
            'Rock', 'Ghost', 'Ice', 'Dragon', 'Dark', 'Steel', 'Flying'
        ];
        return view('pokemon.edit', compact('pokemon', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePokemonRequest $request, pokemon $pokemon)
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('pokemon_photo', 'public');
            $validated['photo'] = $path;
        }

        $pokemon->update($validated);

        return redirect()->route('pokemon.index')->with('success', 'Pokemon updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pokemon $pokemon)
    {
        $pokemon->delete();
        return redirect()->route('pokemon.index')->with('success', 'Pokemon deleted successfully.');
    }
}
