@extends('layouts.app')
section('content')
<div class="container">
    <h1>Create New Pokemon</h1>
    <form action="{{ route('pokemon.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="id">id</label>
            <input type="text" class="form-control" id="id" name="id" required maxlength="255">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required maxlength="255">
        </div>
        <div class="form-group">
            <label for="species">Species</label>
            <input type="text" class="form-control" id="species" name="species" required maxlength="100">
        </div>
        <div class="form-group">
            <label for="primary_type">Primary Type</label>
            <select class="form-control" id="primary_type" name="primary_type" required>
                @foreach($types as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="weight">Weight</label>
            <input type="number" step="0.01" class="form-control" id="weight" name="weight" min="0" max="999999.99">
        </div>
        <div class="form-group">
            <label for="height">Height</label>
            <input type="number" step="0.01" class="form-control" id="height" name="height" min="0" max="999999.99">
        </div>
        <div class="form-group">
            <label for="hp">HP</label>
            <input type="number" class="form-control" id="hp" name="hp" min="0" max="9999">
        </div>
        <div class="form-group">
            <label for="attack">Attack</label>
            <input type="number" class="form-control" id="attack" name="attack" min="0" max="9999">
        </div>
        <div class="form-group">
            <label for="defense">Defense</label>
            <input type="number" class="form-control" id="defense" name="defense" min="0" max="9999">
        </div>
        <div class="form-group">
            <label for="is_legendary">Is Legendary</label>
            <select class="form-control" id="is_legendary" name="is_legendary">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>

        <div class="form-group">
            <label for="photo">photo</label>
            <input type="file" class="form-control" id="photo"  name="photo">
        </div>

        <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>
    </div>
</div>

@endsection