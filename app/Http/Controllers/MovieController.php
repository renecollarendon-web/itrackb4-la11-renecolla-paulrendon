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
    public function index()
    {
        $movies =$this->getMovies();
        return view('movies.index', ['movies' => $movies]);
    }

    public function show($id){
        $movies = $this->getMovies();
        if (!isset($movies[$id])){
            abort(404);
        }
        $movie = $movies[$id];
        return view('movies.show', ['movie' => $movie]);
    }


    public function featured()
{
    $movies = $this->getMovies();
    
    // Choose one movie as featured — I'll pick Spirited Away (ID 3)
    $featuredMovie = $movies[3];
    
    // You can reuse the detail view!
    return view('movies.show', ['movie' => $featuredMovie]);
}


    public function filter($genre = null)  // Note the default value!
{
    $allMovies = $this->getMovies();
    
    // If no genre is provided, show all
    if ($genre === null) {
        $movies = $allMovies;
        $activeFilter = 'All Movies';
    } else {
        // Filter movies by genre
        $movies = [];
        foreach ($allMovies as $movie) {
            // Check if the genre is in the movie's genre list
            if (strpos($movie['genre'], $genre) !== false) {
                $movies[] = $movie;
            }
        }
        $activeFilter = $genre;
    }
    return view('movies.filter', [
        'movies' => $movies,
        'activeFilter' => $activeFilter
    ]);
}
}