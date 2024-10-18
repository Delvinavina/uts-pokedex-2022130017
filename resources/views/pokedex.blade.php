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
            @foreach ($pokemon as $pokemon)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ $pokemon->photo_url }}" class="card-img-top" alt="{{ $pokemon->name }}">
                        <div class="card-body">
                            <h5 class="card-title">#{{ $pokemon->id }} {{ $pokemon->name }}</h5>
                            <p class="card-text">Type: {{ $pokemon->type }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $pokemon->links() }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>