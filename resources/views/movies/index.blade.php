@extends('layouts.app')

@section('title', 'All Movies')

@section('content')

    {{-- Active Filters Display --}}
    @if (request()->filled('genre_id') || request()->filled('year'))
        <div class="alert alert-info">
            <strong>Active Filters:</strong>
            @if (request()->filled('genre_id')) 
                Genre: {{ \App\Models\Genre::find(request('genre_id'))->name ?? request('genre_id') }} 
            @endif
            @if (request()->filled('year')) 
                Year: {{ request('year') }} 
            @endif
            <a href="{{ route('movies.index') }}" class="btn btn-sm btn-secondary ms-2">Clear All</a>
        </div>
    @endif

    {{-- Filter Links --}}
    <div class="mb-3">
        <strong>Filter by Genre:</strong>
        @foreach($genres as $g)
            <a href="{{ route('movies.index', ['genre_id' => $g->id, 'year' => request('year')]) }}" 
               class="me-2 {{ request('genre_id') == $g->id ? 'fw-bold text-decoration-underline' : '' }}">
                {{ $g->name }}
            </a>
        @endforeach
    </div>

        <div class="mb-3">
        <strong>Filter by Year:</strong>
        @php
            // Pansamantala nating nilagay ang years nang mano-mano para makuha ang tamang query count
          $years = \App\Models\Movie::select('year')->distinct()->orderBy('year', 'desc')->pluck('year');
        @endphp
        @foreach($years as $y)
            <a href="{{ route('movies.index', ['year' => $y, 'genre_id' => request('genre_id')]) }}" 
               class="me-2 {{ request('year') == $y ? 'fw-bold text-decoration-underline' : '' }}">
                {{ $y }}
            </a>
        @endforeach
    </div>

    {{-- Buttons --}}
    <div class="mb-3">
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Clear All Filters</a>
        <a href="{{ route('movies.create') }}" class="btn btn-success">Add New Movie</a>
    </div>

    <h2>My Favorite Movies</h2>

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
                    <td>{{ $movie->genre->name }}</td> {{-- ✅ Galing na sa relationship --}}
                    <td>
                        {{ $movie->rating }}
                        @if ($movie->rating >= 8.5)
                            <span class="badge bg-success">Top Rated!</span>
                        @endif
                    </td>
                    <td>{{ $movie->director }}</td>
                    <td>{{ $movie->year }}</td>
                    <td>
                        <a href="{{ route('movies.show', $movie->id) }}">View Details</a>
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
