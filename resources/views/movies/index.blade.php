@extends('layouts.app')

@section('title', 'All Movies')

@section('content')

@if ($genre || $year)
    <div class="alert alert-info">
        <strong>Active Filters:</strong>
        @if ($genre) Genre: {{ $genre }} @endif
        @if ($year) Year: {{ $year }} @endif
        <a href="{{ route('movies.index') }}">Clear All</a>
    </div>
@endif

<div class="mb-3">
    <strong>Filter by Genre:</strong>
    <a href="{{ route('movies.index', ['genre' => 'Romance', 'year' => $year]) }}">Romance</a>
    <a href="{{ route('movies.index', ['genre' => 'Drama', 'year' => $year]) }}">Drama</a>
    <a href="{{ route('movies.index', ['genre' => 'Fantasy', 'year' => $year]) }}">Fantasy</a>
</div>

<div class="mb-3">
    <strong>Filter by Year:</strong>
    <a href="{{ route('movies.index', ['year' => '2016', 'genre' => $genre]) }}">2016</a>
    <a href="{{ route('movies.index', ['year' => '2017', 'genre' => $genre]) }}">2017</a>
    <a href="{{ route('movies.index', ['year' => '2019', 'genre' => $genre]) }}">2019</a>
</div>

<a href="{{ route('movies.index') }}" class="btn btn-secondary">Clear All Filters</a>

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
