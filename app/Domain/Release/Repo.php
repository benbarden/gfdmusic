<?php

namespace App\Domain\Release;

use App\Models\Artist;
use App\Models\Release;

class Repo
{
    public function byUrl(Artist $artist, $url)
    {
        return Release::where('artist_id', $artist->id)->where('url', $url)->first();
    }

    public function latest()
    {
        return Release::whereNotIn('type', [Release::TYPE_ALBUM])->orderBy('release_date', 'desc')->first();
    }
}