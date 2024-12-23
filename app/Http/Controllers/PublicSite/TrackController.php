<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;

use App\Domain\Artist\Repo as RepoArtist;
use App\Domain\Track\Repo as RepoTrack;

use App\Domain\Stores\Spotify;

use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function __construct(
        private RepoArtist $repoArtist,
        private RepoTrack $repoTrack
    )
    {
    }

    public function show()
    {
        $request = request();
        $artistUrl = $request->artistUrl;
        $trackUrl = $request->trackUrl;

        $artist = $this->repoArtist->byUrl($artistUrl);
        if (!$artist) abort(404);
        $track = $this->repoTrack->byUrl($artist, $trackUrl);
        if (!$track) abort(404);

        $storeSpotify = new Spotify;
        $trackId = $storeSpotify->getTrackId($track->store_spotify_link);

        $bindings = [];
        $bindings['Track'] = $track;
        $bindings['SpotifyTrackId'] = $trackId;

        return view('public.track.show', $bindings);
    }
}
