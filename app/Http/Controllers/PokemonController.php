<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokemon = Pokemon::paginate(10);

        return view('pokemon.index', compact('pokemon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = [
            'Grass', 'Fire', 'Water', 'Bug', 'Normal', 'Poison',
            'Electric', 'Ground', 'Fairy', 'Fighting', 'Psychic',
            'Rock', 'Ghost', 'Ice', 'Dragon', 'Dark', 'Steel', 'Flying'
        ];

        return view('pokemon.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => [
                'required',
                'string',
                'max:50',
                Rule::in([
                    'Grass', 'Fire', 'Water', 'Bug', 'Normal', 'Poison',
                    'Electric', 'Ground', 'Fairy', 'Fighting', 'Psychic',
                    'Rock', 'Ghost', 'Ice', 'Dragon', 'Dark', 'Steel', 'Flying'
                ]),
            ],
            'weight' => 'nullable|numeric|between:0,999999.99',
            'height' => 'nullable|numeric|between:0,999999.99',
            'hp' => 'nullable|integer|min:0|max:9999',
            'attack' => 'nullable|integer|min:0|max:9999',
            'defense' => 'nullable|integer|min:0|max:9999',
            'is_legendary' => 'boolean',
            'photo' => 'nullable|image|max:2048|mimes:jpeg,jpg,png,gif,svg',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('pokemon_photo', 'public');
            $validated['photo'] = $path;
        }

        Pokemon::create($validated);

        return redirect()->route('pokemon.index')->with('success', 'Pokemon created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        return view('pokemon.show', compact('pokemon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        $types = [
            'Grass', 'Fire', 'Water', 'Bug', 'Normal', 'Poison',
            'Electric', 'Ground', 'Fairy', 'Fighting', 'Psychic',
            'Rock', 'Ghost', 'Ice', 'Dragon', 'Dark', 'Steel', 'Flying'
        ];

        // dd($pokemon->name);

        return view('pokemon.edit', compact('pokemon', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => [
                'required',
                'string',
                'max:50',
                Rule::in([
                    'Grass', 'Fire', 'Water', 'Bug', 'Normal', 'Poison',
                    'Electric', 'Ground', 'Fairy', 'Fighting', 'Psychic',
                    'Rock', 'Ghost', 'Ice', 'Dragon', 'Dark', 'Steel', 'Flying'
                ]),
            ],
            'weight' => 'nullable|numeric|between:0,999999.99',
            'height' => 'nullable|numeric|between:0,999999.99',
            'hp' => 'nullable|integer|min:0|max:9999',
            'attack' => 'nullable|integer|min:0|max:9999',
            'defense' => 'nullable|integer|min:0|max:9999',
            'is_legendary' => 'boolean',
            'photo' => 'nullable|image|max:2048|mimes:jpeg,jpg,png,gif,svg',
        ]);

        if ($request->hasFile('photo')) {
            if ($pokemon->photo) {
                Storage::delete($pokemon->photo);
            }
            $path = $request->file('photo')->store('pokemon_photo', 'public');
            $validated['photo'] = $path;
        }

        $pokemon->update($validated);

        return redirect()->route('pokemon.index')->with('success', 'Pokemon updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        if ($pokemon->photo) {
            Storage::delete($pokemon->photo);
        }

        $pokemon->delete();
        return redirect()->route('pokemon.index')->with('success', 'Pokemon deleted successfully.');
    }
}
