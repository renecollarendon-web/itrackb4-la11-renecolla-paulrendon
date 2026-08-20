<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = [
            ['title' => 'Your Name', 'genre' => 'Romance, Fantasy, Drama', 'rating' => 8.4],
            ['title' => 'A Silent Voice', 'genre' => 'Drama, Romance', 'rating' => 8.1],
            ['title' => 'Spirited Away', 'genre' => 'Fantasy, Adventure, Supernatural', 'rating' => 8.6],
            ['title' => 'I Want To Eat Your Pancreas', 'genre' => 'Drama, Romance', 'rating' => 8.0],
            ['title' => 'Weathering With You', 'genre' => 'Romance, Fantasy, Drama', 'rating' => 8.0],
        ];

        return view('movies.index', ['movies' => $movies]);
    }
}