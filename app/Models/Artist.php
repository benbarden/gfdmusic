<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artist extends Model
{
    use HasFactory;

    protected $table = 'artists';

    protected $fillable = [
        'name', 'url',
        'social_threads_id', 'social_bluesky_id', 'social_twitter_id',
        'website_url',
        'store_spotify_link', 'store_soundcloud_link', 'store_youtube_link', 'store_apple_link', 'store_amazon_link', 'store_bandcamp_link'
    ];

    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class, 'artist_id', 'id');
    }

    public function releases(): HasMany
    {
        return $this->hasMany(Release::class, 'artist_id', 'id');
    }
}
