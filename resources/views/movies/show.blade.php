<!DOCTYPE html>
<html>
<head>
    <title>{{ $movie['title'] }} - Movie Details</title>
</head>
<body>
    <h1>{{ $movie['title'] }}</h1>
    <p><strong>Prepared by:</strong> Paul Rendon B. Renecolla</p>
    
    <ul>
        <li><strong>Genre:</strong> {{ $movie['genre'] }}</li>
        <li><strong>Rating:</strong> {{ $movie['rating'] }}/10</li>
        <li><strong>Director:</strong> {{ $movie['director'] }}</li>
        <li><strong>Year:</strong> {{ $movie['year'] }}</li>
    </ul>
    
    <!-- IMPORTANT: Link back to list using route name -->
    <a href="{{ route('movies.index') }}">Back to all movies</a>
</body>
</html>