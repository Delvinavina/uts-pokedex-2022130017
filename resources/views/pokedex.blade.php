@extends('layouts.template')

@section('title', 'All Pokemon')

@section('body')
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Pokedex</h1>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @if ($pokemon->isEmpty())
                <div class="col-12 text-center">
                    <div class="alert alert-warning" role="alert">
                        No Pokemon found.
                    </div>
                </div>
            @else
                @foreach ($pokemon as $p)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ $p->photo_url }}" class="img-fluid card-img-top" alt="{{ $p->name }}" height="100">
                            <div class="card-body">
                                <h5 class="card-title">#{{ $p->id }} {{ $p->name }}</h5>
                                <p class="card-text">Species: {{ $p->species }}</p>
                                <p class="card-text">Type: {{ $p->primary_type }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $pokemon->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection