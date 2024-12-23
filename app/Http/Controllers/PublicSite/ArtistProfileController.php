<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;

use App\Domain\Artist\Repo as RepoArtist;
use App\Domain\Track\Repo as RepoTrack;

use App\Domain\Stores\Spotify;

use Illuminate\Http\Request;

class ArtistProfileController extends Controller
{
    public function __construct(
        private RepoArtist $repoArtist
    )
    {
    }

    public function show()
    {
        $request = request();
        $artistUrl = $request->artistUrl;

        $artist = $this->repoArtist->byUrl($artistUrl);
        if (!$artist) abort(404);

        $bindings = [];
        $bindings['Artist'] = $artist;

        return view('public.artist-profile.show', $bindings);
    }
}
