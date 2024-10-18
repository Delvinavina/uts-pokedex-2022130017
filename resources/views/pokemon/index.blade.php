extends('layouts.template')

@section('title', 'pokemon')

@section('body')
<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>All pokemon</h1>

    <a href="{{ route('pokemon.create') }}" class="btn btn-primary btn-sm">Create New pokemon</a>
</div>


@if (session()->has('success'))
    <div class="alert alert-success mt-4">
        {{ session()->get('success') }}
    </div>
@endif

<div class="container mt-5">
    <table class="table table-bordered mb-5">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">species</th>
                <th scope="col">primary_type</th>
                <th scope="col">weight</th>
                <th scope="col">height</th>
                <th scope="col">hp</th>
                <th scope="col">attack</th>
                <th scope="col">defense</th>
                <th scope="col">is_legendary</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pokemon as $pokemon)
            <tr>
                <th scope="row">{{  $pokemon->id }}</th>
                <td>
                    <a href="{{ route('pokemon.show', $pokemon) }}">
                    {{ $pokemon->name }}
                    </a>
                </td>
                <td>{{ Str::limit($pokemon->species, 50, '...') }}</td>
                <td>{{ $pokemon->primary_type }}</td>
                <td>{{ $pokemon->weight }}</td>
                <td>{{ $pokemon->height }}</td>
                <td>{{ $pokemon->hp }}</td>
                <td>{{ $pokemon->attack }}</td>
                <td>{{ $pokemon->defense }}</td>
                <td>{{ $pokemon->is_legendary }}</td>
                <td>
                    <a href="{{ route('pokemon.edit' , $pokemon)}}" class="btn btn-primary btn-sm">
                        Edit
                    </a>
                    <form action= "{{ route( pokemon.destroy , $pokemon)" method="POST" class="d-inline-block">
                            @method('DELETE')
                            @csrf

                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(Are you sure?)">Delete</button>
                    </form>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No pokemon found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $pokemon->links() !!}
    </div>
</div>
@endsection