<?php

namespace App\Domain\Track;

use App\Models\Artist;
use App\Models\Track;

class Repo
{
    public function byUrl(Artist $artist, $url)
    {
        return Track::where('artist_id', $artist->id)->where('url', $url)->first();
    }

    public function byName(Artist $artist, $name)
    {
        return Track::where('artist_id', $artist->id)->where('name', $name)->first();
    }

    public function trackList()
    {
        return Track::orderBy('id', 'desc')->get();
    }
}