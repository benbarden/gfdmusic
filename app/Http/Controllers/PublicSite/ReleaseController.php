<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;

use App\Domain\Artist\Repo as RepoArtist;
use App\Domain\Release\Repo as RepoRelease;

use App\Domain\Stores\Spotify;

use Illuminate\Http\Request;

class ReleaseController extends Controller
{
    public function __construct(
        private RepoArtist $repoArtist,
        private RepoRelease $repoRelease
    )
    {
    }

    public function show()
    {
        $request = request();
        $artistUrl = $request->artistUrl;
        $releaseUrl = $request->releaseUrl;

        $artist = $this->repoArtist->byUrl($artistUrl);
        if (!$artist) abort(404);
        $release = $this->repoRelease->byUrl($artist, $releaseUrl);
        if (!$release) abort(404);

        $storeSpotify = new Spotify;
        $trackId = $storeSpotify->getTrackId($release->store_spotify_link);

        $bindings = [];
        $bindings['Release'] = $release;
        $bindings['SpotifyTrackId'] = $trackId;

        return view('public.release.show', $bindings);
    }
}
