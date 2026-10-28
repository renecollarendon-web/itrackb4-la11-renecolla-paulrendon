@extends('layouts.app')

@section('title', 'All Movies')

@section('content')

    {{-- Active Filters Display --}}
    @if ($genre_id || $year)
        <div class="alert alert-info">
            <strong>Active Filters:</strong>
            @if ($genre_id) Genre ID: {{ $genre_id }} @endif
            @if ($year) Year: {{ $year }} @endif
            <a href="{{ route('movies.index') }}" class="btn btn-sm btn-secondary">Clear All</a>
        </div>
    @endif

    {{-- Filter Links (Gamit ang ID) --}}
    <div class="mb-3">
        <strong>Filter by Genre:</strong>
        @foreach ($genres as $g)
            <a href="{{ route('movies.index', ['genre_id' => $g->id, 'year' => $year]) }}">{{ $g->name }}</a>
        @endforeach
    </div>

    <div class="mb-3">
        <strong>Filter by Year:</strong>
        <a href="{{ route('movies.index', ['year' => '2016', 'genre_id' => $genre_id]) }}">2016</a>
        <a href="{{ route('movies.index', ['year' => '2017', 'genre_id' => $genre_id]) }}">2017</a>
        <a href="{{ route('movies.index', ['year' => '2019', 'genre_id' => $genre_id]) }}">2019</a>
    </div>

    <a href="{{ route('movies.index') }}" class="btn btn-secondary mb-3">Clear All Filters</a>
    <a href="{{ route('movies.create') }}" class="btn btn-success mb-3">Add New Movie</a>

    {{-- Movies Table --}}
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
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
        <tbody>
            @forelse ($movies as $movie)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->genre->name }}</td>
                    <td>
                        {{ $movie->rating }}
                        @if ($movie->rating >= 8.5)
                            <span class="badge bg-success">Top Rated!</span>
                        @endif
                    </td>
                    <td>{{ $movie->director }}</td>
                    <td>{{ $movie->year }}</td>
                    <td>
                        {{-- View Details Link --}}
                        <a href="{{ route('movies.show', $movie) }}" class="btn btn-sm btn-info text-white">View</a>
                        
                        {{-- Edit Link --}}
                        <a href="{{ route('movies.edit', $movie) }}" class="btn btn-sm btn-primary">Edit</a>

                        {{-- Delete Form (ITO ANG BAGO) --}}
                        <form action="{{ route('movies.destroy', $movie) }}" method="POST" onsubmit="return confirm('Delete this record?')" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        No movies found. Please add some movies to your collection.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection