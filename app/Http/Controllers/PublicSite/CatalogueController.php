<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;

use App\Domain\Track\Repo as RepoTrack;
use App\Domain\Release\Repo as RepoRelease;

use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function __construct(
        private RepoTrack $repoTrack,
        private RepoRelease $repoRelease
    )
    {

    }

    public function releases()
    {
        $releases = $this->repoRelease->releaseList();

        $bindings = [];

        $bindings['Releases'] = $releases;

        return view('public.catalogue.releases', $bindings);
    }

    public function tracks()
    {
        $tracks = $this->repoTrack->trackList();

        $bindings = [];

        $bindings['Tracks'] = $tracks;

        return view('public.catalogue.tracks', $bindings);
    }
}
