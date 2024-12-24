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

    public function releaseList()
    {
        return Release::orderBy('release_date', 'desc')->get();
    }

    public function latestNotAlbum()
    {
        return Release::whereNotIn('type', [Release::TYPE_ALBUM])->orderBy('release_date', 'desc')->first();
    }

    public function latestAlbum()
    {
        return Release::where('type', Release::TYPE_ALBUM)->orderBy('release_date', 'desc')->first();
    }

    public function latestNotAlbumSkip($skipHowMany)
    {
        return Release::whereNotIn('type', [Release::TYPE_ALBUM])->orderBy('release_date', 'desc')->offset($skipHowMany)->limit(5)->get();
    }
}