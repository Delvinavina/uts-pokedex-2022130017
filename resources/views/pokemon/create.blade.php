@extends('layouts.template')

@section('body')
    <div class="container my-5">
        <h1>Create New Pokemon</h1>
        <form action="{{ route('pokemon.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- <div class="form-group mb-2">
                <label for="id">Id</label>
                <input type="text" class="form-control" id="id" name="id" required maxlength="255"
                    placeholder="Enter Pokemon ID">
            </div> --}}

            <div class="form-group mb-2">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required maxlength="255"
                    placeholder="Enter Pokemon Name">
            </div>

            <div class="form-group mb-2">
                <label for="species">Species</label>
                <input type="text" class="form-control" id="species" name="species" required maxlength="100"
                    placeholder="Enter Pokemon Species">
            </div>

            <div class="form-group mb-2">
                <label for="primary_type">Primary Type</label>
                <select class="form-control" id="primary_type" name="primary_type" required>
                    @foreach ($types as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-2">
                <label for="weight">Weight (kg)</label>
                <input type="number" step="0.01" class="form-control" id="weight" name="weight" min="0"
                    max="999999.99" placeholder="Enter Weight">
            </div>

            <div class="form-group mb-2">
                <label for="height">Height (m)</label>
                <input type="number" step="0.01" class="form-control" id="height" name="height" min="0"
                    max="999999.99" placeholder="Enter Height">
            </div>

            <div class="form-group mb-2">
                <label for="hp">HP</label>
                <input type="number" class="form-control" id="hp" name="hp" min="0" max="9999"
                    placeholder="Enter HP">
            </div>

            <div class="form-group mb-2">
                <label for="attack">Attack</label>
                <input type="number" class="form-control" id="attack" name="attack" min="0" max="9999"
                    placeholder="Enter Attack Points">
            </div>

            <div class="form-group mb-2">
                <label for="defense">Defense</label>
                <input type="number" class="form-control" id="defense" name="defense" min="0" max="9999"
                    placeholder="Enter Defense Points">
            </div>

            <div class="form-group mb-2">
                <label for="is_legendary">Is Legendary</label>
                <select class="form-control" id="is_legendary" name="is_legendary" required>
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>

            <div class="form-group mb-2">
                <label for="photo">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>
    </div>
@endsection
