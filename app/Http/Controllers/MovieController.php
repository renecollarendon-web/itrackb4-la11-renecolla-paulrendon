<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class MovieController extends Controller
{
       private function getMovies()
    {
        return [

            1 =>['id' => 1, 'title' => 'Your Name', 'genre' => 'Romance, Fantasy, Drama', 'rating' => 8.8, 'director' => 'Makoto Shinkai', 'year' => 2016],
            2 =>['id' => 2, 'title' => 'A Silent Voice', 'genre' => 'Drama, Romance', 'rating' => 8.1, 'director' => 'Naoko Yamada ', 'year' => 2016],
            3 =>['id' => 3, 'title' => 'Spirited Away', 'genre' => 'Fantasy, Adventure, Supernatural', 'rating' => 8.6, 'director' => 'Hayao Miyazaki', 'year' => 2001],
            4 => ['id' => 4, 'title' => 'I Want To Eat Your Pancreas', 'genre' => 'Drama, Romance', 'rating' => 8.1, 'director' => 'Shinichiro Ushijima', 'year' => 2017],
            5 =>['id' => 5, 'title' => 'Weathering With You', 'genre' => 'Romance, Fantasy, Drama', 'rating' => 8.2, 'director' => 'Makoto Shinkai', 'year' => 2019],
            6 => ['id' => 6, 'title' => 'Princess Mononoke', 'genre' => 'Fantasy, Adventure, Action', 'rating' => 8.4, 'director' => 'Hayao Miyazaki', 'year' => 1997],
        ];
}
    public function index(Request $request)
{
    $allMovies = $this->getMovies();
    
    $genre = $request->query('genre');
    $year = $request->query('year');
    
    $movies = $allMovies;
    if ($genre !== null) {
        $movies = array_filter($movies, function($movie) use ($genre) {
            return strpos($movie['genre'], $genre) !== false;
        });
    }
    if ($year !== null) {
        $movies = array_filter($movies, function($movie) use ($year) {
            return $movie['year'] == $year;
        });
    }
    return view('movies.index', [
        'movies' => $movies,
        'genre' => $genre,
        'year' => $year
    ]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $movies = $this->getMovies();
        if (!isset($movies[$id])){
            abort(404);
        }
        $movie = $movies[$id];
        return view('movies.show', ['movie' => $movie]);
    }

    public function edit(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(string $id)
    {
        
    }
public function featured()
{
    $movies = $this->getMovies();
    $featuredMovie = $movies[3];
    return view('movies.show', ['movie' => $featuredMovie]);
}


    
}

