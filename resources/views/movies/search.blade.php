<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Search</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Movie Search App</h1>
        <form method="POST" action="{{ route('movies.search') }}" class="mb-4">
            @csrf
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search for a movie..." required>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        @if(isset($movies))
    <div class="row">
        @foreach($movies as $movie)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ $movie['Poster'] }}" class="card-img-top" alt="No image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie['Title'] }}</h5>
                        <p class="card-text">Year: {{ $movie['Year'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="pagination">
        <ul class="pagination">
            @for ($i = 1; $i <= $totalPages; $i++)
                <li class="page-item {{ $i == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ url()->current() }}?query={{ request('query') }}&page={{ $i }}">{{ $i }}</a>
                </li>
            @endfor
        </ul>
    </div>
@endif
