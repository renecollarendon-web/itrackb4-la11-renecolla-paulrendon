@extends('layouts.app')

@section('title', $movie['title'])

@section('content')
   
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $movie['title'] }}</h2>
            <p><strong>Genre:</strong> {{ $movie->genre->name }}</p>
            <p><strong>Rating:</strong> {{ $movie['rating'] }}/10</p>
            <p><strong>Director:</strong> {{ $movie['director'] }}</p>
            <p><strong>Year:</strong> {{ $movie['year'] }}</p>
            
            <a href="{{ route('movies.index') }}" class="btn btn-primary"> Back to All Movies</a>
        </div>
    </div>
@endsection




