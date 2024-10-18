<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Pokedex</h1>
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
                            <img src="{{ $p->photo_url }}" class="card-img-top" alt="{{ $p->name }}">
                            <div class="card-body">
                                <h5 class="card-title">#{{ $p->id }} {{ $p->name }}</h5>
                                <p class="card-text">Type: {{ $p->type }}</p>
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
