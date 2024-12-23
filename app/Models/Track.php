<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Track extends Model
{
    use HasFactory;

    protected $table = 'tracks';

    protected $fillable = ['name', 'url', 'artist_id', 'blurb',
        'store_spotify_link', 'store_soundcloud_link', 'store_youtube_link', 'store_apple_link', 'store_amazon_link', 'store_bandcamp_link'];

    public function artist(): HasOne
    {
        return $this->hasOne(Artist::class, 'id', 'artist_id');
    }
}
