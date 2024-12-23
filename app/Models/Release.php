<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Release extends Model
{
    use HasFactory;

    const TYPE_ALBUM = 'Album';
    const TYPE_EP = 'EP';
    const TYPE_SINGLE = 'Single';
    const TYPE_COMPILATION = 'Compilation';
    const TYPE_PLAYLIST = 'Playlist';

    const STATUS_LIVE = 'Live';
    const STATUS_DRAFT = 'Draft';
    const STATUS_ARCHIVED = 'Archived';

    protected $table = 'releases';

    protected $fillable = ['name', 'url', 'blurb', 'artwork_local_url', 'type', 'status', 'artist_id', 'release_date',
        'store_spotify_link', 'store_soundcloud_link', 'store_youtube_link', 'store_apple_link', 'store_amazon_link', 'store_bandcamp_link'
    ];

    public function artist(): HasOne
    {
        return $this->hasOne(Artist::class, 'id', 'artist_id');
    }

    public function releaseTracks(): HasMany
    {
        return $this->hasMany(ReleaseTrack::class, 'release_id', 'id');
    }
}
