<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 

class Movie extends Model
{
    protected $fillable = [
        'title',
        'genre_id',
        'rating',
        'director',
        'year',
        'is_featured',
        'remarks',
    ];

    protected function casts(): array
{
    return [
        'rating' => 'integer',
        'year' => 'integer',
        'is_featured' => 'boolean',
    ];
    
}
public function genre(): BelongsTo // ⚠️ SINGULAR
{
    return $this->belongsTo(Genre::class);
}

}

