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
                            <img src="{{ $p->photo_url }}" class="img-fluid card-img-top px-4 py-4" alt="{{ $p->name }}" height="100">
                            <div class="card-body">
                                <p class="card-text mb-0 pb-0">#{{ str_pad($p->id, 4, '0', STR_PAD_LEFT) }}</p>
                                <h4 class="card-title fw-bold">{{ $p->name }}</h4>
                                {{-- <p class="card-text">Species: {{ $p->species }}</p>
                                <p class="card-text">Type: {{ $p->primary_type }}</p> --}}
                                <h5 class="card-text"><span class="badge bg-success">{{ $p->primary_type }}</span></h5>
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