@extends('layouts.template')

@section('title', 'Update Pokemon')

@section('body')
    <div class="container">
        <div class="mt-4 p-5 bg-black text-white rounded">
            <h1>Update Existing Pokemon</h1>
        </div>

        <div class="row mt-2 mb-5">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger mt-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pokemon.update', $pokemon) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required
                            placeholder="Enter Name" value="{{ old('name', $pokemon->name) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="species">Species</label>
                        <input type="text" class="form-control" id="species" name="species" required
                            placeholder="Enter Species" value="{{ old('species', $pokemon->species) }}">
                    </div>

                    <div class="form-group mb-2">
                        <label for="primary_type">Primary Type</label>
                        <select class="form-control" id="primary_type" name="primary_type" required>
                            @foreach ($types as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="weight">Weight (kg)</label>
                        <input type="number" class="form-control" id="weight" name="weight" step="0.01"
                            placeholder="Enter Weight" value="{{ old('weight', $pokemon->weight) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="height">Height (m)</label>
                        <input type="number" class="form-control" id="height" name="height" step="0.01"
                            placeholder="Enter Height" value="{{ old('height', $pokemon->height) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="hp">HP</label>
                        <input type="number" class="form-control" id="hp" name="hp" placeholder=" HP"
                            value="{{ old('hp', $pokemon->hp) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="attack">Attack</label>
                        <input type="number" class="form-control" id="attack" name="attack"
                            placeholder="Enter Attack Points" value="{{ old('attack', $pokemon->attack) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="defense">Defense</label>
                        <input type="number" class="form-control" id="defense" name="defense"
                            placeholder="Enter Defense Points" value="{{ old('defense', $pokemon->defense) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="is_legendary">Is Legendary</label>
                        <select class="form-control" id="is_legendary" name="is_legendary" required>
                            <option value="0"
                                {{ old('is_legendary', $pokemon->is_legendary) == 0 ? 'selected' : '' }}>No
                            </option>
                            <option value="1"
                                {{ old('is_legendary', $pokemon->is_legendary) == 1 ? 'selected' : '' }}>Yes
                            </option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                        @if ($pokemon->photo)
                            <img src="{{ $pokemon->photo_url }}" class="mt-3" style="max-width: 400px;"
                                alt="Current Photo" />
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>
        </div>

    </div>
@endsection
