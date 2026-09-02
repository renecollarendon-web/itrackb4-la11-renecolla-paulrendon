<!DOCTYPE html>
<html>
<head>
    <title>Movies - {{ $activeFilter }}</title>
</head>
<body>
    <h1>Movies: {{ $activeFilter }}</h1>
    <p>Prepared by: Paul Rendon B. Renecolla</p>
    
    @if (count($movies) > 0)
        <table border="1" cellpadding="8">
            <tr>
                <th>Title</th>
                <th>Genre</th>
                <th>Rating</th>
                <th>Director</th>
                <th>Year</th>
            </tr>
            @foreach ($movies as $movie)
            <tr>
                <td>{{ $movie['title'] }}</td>
                <td>{{ $movie['genre'] }}</td>
                <td>{{ $movie['rating'] }}</td>
                <td>{{ $movie['director'] }}</td>
                <td>{{ $movie['year'] }}</td>
            </tr>
            @endforeach
        </table>
    @else
        <p>No movies found in this genre.</p>
    @endif
    
    <a href="{{ route('movies.index') }}">Back to all movies</a>
</body>
</html>