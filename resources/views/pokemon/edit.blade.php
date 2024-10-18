@extends('layouts.template')

@section('title', 'Update pokemon')

@section('body')

<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>Update Existing Pokemon</h1>
</div>

<div class="row my-5">
    <div class="col-12 px-5">
        @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('pokemon.update', $pokemon) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

        <div class="form-group">
            <label for="name">name</label>
            <input type="text" class="form-control" id="name"  placeholder="name" name="name" required value="{{ old('name' , $pokemon->name) }}">
        </div>
        <div class="form-group">
            <label for="species">species</label>
            <input type="text" class="form-control" id="species"  placeholder="species" name="species" required value="{{ old('species' , $pokemon->species) }}">
        </div>

        <div class="form-group">
            <label for="primary_type">primary_type</label>
            <input type="text" class="form-control" id="primary_type"  placeholder="primary_type" name="primary_type" value="{{ old('primary_type' , $pokemon->primary_type) }}">
        </div>

        <div class="form-group">
            <label for="weight">weight</label>
            <input type="text" class="form-control" id="weight"  placeholder="weight" name="weight" value="{{ old('weight' , $pokemon->weight) }}">
        </div>
        <div class="form-group">
            <label for="height">height</label>
            <input type="text" class="form-control" id="height"  placeholder="height" name="height" value="{{ old('height' , $pokemon->height) }}">
        </div>
        <div class="form-group">
            <label for="hp">hp</label>
            <input type="text" class="form-control" id="hp"  placeholder="hp" name="hp" value="{{ old('hp' , $pokemon->hp) }}">
        </div>
        <div class="form-group">
            <label for="attack">attack</label>
            <input type="text" class="form-control" id="attack"  placeholder="attack" name="attack" value="{{ old('attack' , $pokemon->attack) }}">
        </div>
        <div class="form-group">
            <label for="defense">defense</label>
            <input type="text" class="form-control" id="defense"  placeholder="defense" name="defense" value="{{ old('defense' , $pokemon->defense) }}">
        </div>
        <div class="form-group">
            <label for="is_legendary">is_legendary</label>
            <input type="text" class="form-control" id="is_legendary"  placeholder="is_legendary" name="is_legendary" value="{{ old('is_legendary' , $pokemon->is_legendary) }}">
        </div>

        <div class="form-group">
            <label for="photo">photo</label>
            <input type="file" class="form-control" id="photo"  name="photo">
            @if ($pokemon->photo)
                <img src= "{{ $pokemon->photo_url }}" class="mt-3" style="max-width: 400px; "/>

            @endif
        </div>

        <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>
    </div>
</div>

@endsection
