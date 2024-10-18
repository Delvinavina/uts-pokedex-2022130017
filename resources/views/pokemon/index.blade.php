@extends('layouts.template')

@section('title', 'All Pokemon')

@section('body')
    <div class="container">
        <div class="mt-4 p-5 bg-black text-white rounded">
            <h1>All Pokemon</h1>
            <a href="{{ route('pokemon.create') }}" class="btn btn-primary btn-sm">Create New Pokemon</a>
        </div>
    </div>

    <div class="container mt-5">

        @if (session()->has('success'))
            <div class="alert alert-success mt-4">
                {{ session()->get('success') }}
            </div>
        @endif

        <table class="table table-bordered mb-5">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Species</th>
                    <th scope="col">Primary Type</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Height</th>
                    <th scope="col">HP</th>
                    <th scope="col">Attack</th>
                    <th scope="col">Defense</th>
                    <th scope="col">Legendary</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pokemon as $poke)
                    <tr>
                        <th scope="row">{{ $poke->id }}</th>
                        <td>
                            <a href="{{ route('pokemon.show', $poke->id) }}">
                                {{ $poke->name }}
                            </a>
                        </td>
                        <td>{{ Str::limit($poke->species, 50, '...') }}</td>
                        <td>{{ $poke->primary_type }}</td>
                        <td>{{ $poke->weight }}</td>
                        <td>{{ $poke->height }}</td>
                        <td>{{ $poke->hp }}</td>
                        <td>{{ $poke->attack }}</td>
                        <td>{{ $poke->defense }}</td>
                        <td>{{ $poke->is_legendary ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('pokemon.edit', $poke) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('pokemon.destroy', $poke) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="text-center">No Pokemon found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {!! $pokemon->links() !!}
        </div>
    </div>
@endsection
