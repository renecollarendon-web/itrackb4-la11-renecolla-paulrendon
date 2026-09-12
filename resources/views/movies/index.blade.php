@extends('layouts.app')

@section('title', 'All Movies')

@section('content')
 <h1> My Favorite Movies</h1>

    <table class="table table-striped table-bordered">
        <thead class='table-dark'>
        <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Rating</th>
            <th>Director</th>
            <th>Year</th>
            <th>Action</th>
        </tr>
        </thead>
        
        @forelse ($movies as $movie)
        <tr class="{{ $movie['rating'] >= 8.5 ? 'table-success' : '' }}">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $movie['title'] }}</td>
            <td>{{ $movie['genre'] }}</td>
            <td>{{ $movie['rating'] }}
                @if ($movie['rating'] >= 8.5)
                  <span class="badge bg-success">Top Rated!</span>
            @endif
            </td>
            <td>{{ $movie['director'] }}</td>
            <td>{{ $movie['year'] }}</td>

            <td>
        <a href="{{ route('movies.show', $movie['id']) }}">View Details</a>
    </td>
        </tr>
        @empty
        <tr>
            <td colspan="7">No movies found. Please add some movies to your collection.</td>
        </tr>
        @endforelse
    </table>
@endsection
