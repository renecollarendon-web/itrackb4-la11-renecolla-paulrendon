<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        // 1. D1 & D2: Gawa ng lookup rows MUna at i-hold sa variables
        $romance = Genre::create(['name' => 'Romance']);
        $drama = Genre::create(['name' => 'Drama']);
        $fantasy = Genre::create(['name' => 'Fantasy']);
        $action = Genre::create(['name' => 'Action']);

        // 2. D3: I-assign ang tamang genre_id at tamang rating
        Movie::create([
            'title' => 'Your Name',
            'genre_id' => $romance->id,
            'rating' => 8.8,
            'director' => 'Makoto Shinkai',
            'year' => 2016,
            'is_featured' => true,
        ]);

        Movie::create([
            'title' => 'A Silent Voice',
            'genre_id' => $drama->id,
            'rating' => 8.1,
            'director' => 'Naoko Yamada',
            'year' => 2016,
            'is_featured' => false,
        ]);

        Movie::create([
            'title' => 'Spirited Away',
            'genre_id' => $fantasy->id,
            'rating' => 8.6,
            'director' => 'Hayao Miyazaki',
            'year' => 2001,
            'is_featured' => true,
        ]);

        Movie::create([
            'title' => 'I Want To Eat Your Pancreas',
            'genre_id' => $drama->id,
            'rating' => 8.1,
            'director' => 'Shinichiro Ushijima',
            'year' => 2017,
            'is_featured' => false,
        ]);

        Movie::create([
            'title' => 'Weathering With You',
            'genre_id' => $romance->id,
            'rating' => 8.2,
            'director' => 'Makoto Shinkai',
            'year' => 2019,
            'is_featured' => false,
        ]);

        Movie::create([
            'title' => 'Princess Mononoke',
            'genre_id' => $action->id,
            'rating' => 8.4,
            'director' => 'Hayao Miyazaki',
            'year' => 1997,
            'is_featured' => false,
        ]);
    }
}