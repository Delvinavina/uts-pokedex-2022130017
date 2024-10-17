<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePokemonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
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
        ];
    }
}
