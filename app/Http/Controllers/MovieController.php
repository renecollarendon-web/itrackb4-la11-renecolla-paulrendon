<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre; 
use Illuminate\Http\Request;


class MovieController extends Controller
{
    /**
     * Display a listing of the movies.
     */
    public function index(Request $request)
{
    $genre_id = $request->query('genre_id'); // Gamit na natin ay genre_id
    $year = $request->query('year');
   
   $query = Movie::with('genre');

    if ($genre_id !== null) {
        $query->where('genre_id', $genre_id); // ✅ ID ang icocompare
    }

    if ($year !== null) {
        $query->where('year', $year);
    }

    $movies = $query->get();
    
    // Kailangan din ipasa ang genres para sa filter links kung gagamitin mo sila
    $genres = Genre::all(); 

    return view('movies.index', compact('movies', 'genre_id', 'year', 'genres'));
}

    /**
     * Show the form for creating a new movie.
     */
    public function create()
{
    $genres = Genre::all();
    return view('movies.create', compact('genres'));
}

    /**
     * Store a newly created movie in storage.
     */

    public function store(Request $request)
{
    // I-validate ang data
    $validated = $request->validate([
        'title' => 'required|max:100',
        'genre_id' => 'required|exists:genres,id', 
        'rating' => 'required|numeric',
        'director' => 'required|max:100',
        'year' => 'required|numeric',
    ]);

    // I-save gamit ang create()
    Movie::create($validated);

    // Redirect pabalik
    return redirect()->route('movies.index')->with('success', 'Movie added successfully.');
}

    /**
     * Display the specified movie.
     */
    public function show(string $id)
    {
        $movie = Movie::findOrFail($id);

        return view('movies.show', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified movie.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified movie in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified movie from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Show a featured movie.
     */
    public function featured()
    {
        $movie = Movie::where('is_featured', true)->first()
            ?? Movie::first();

        return view('movies.show', ['movie' => $movie]);
    }
}