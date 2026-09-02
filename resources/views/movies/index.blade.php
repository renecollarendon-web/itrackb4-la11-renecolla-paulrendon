<!DOCTYPE html>
<html>
<head>
    <title>My Favorite Movies</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f0f0f0;
        }
        h1 {
            color: #2c3e50;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th {
            background-color: #3498db;
            color: white;
            padding: 12px;
            text-align: left;
        }
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .name {
            margin-top: 20px;
            font-style: italic;
            color: #555;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <h1> My Favorite Movies</h1>

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

            <td>
        <a href="{{ route('movies.show', $movie['id']) }}">View Details</a>
    </td>
        </tr>
        @endforeach
    </table>

    <p class="name">Prepared by: Paul Rendon B. Renecolla | Block 4A</p>
</body>
</html>