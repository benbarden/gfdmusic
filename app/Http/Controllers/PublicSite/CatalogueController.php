<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;

use App\Domain\Track\Repo as RepoTrack;

use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function __construct(
        private RepoTrack $repoTrack
    )
    {

    }

    public function show()
    {
        $tracks = $this->repoTrack->trackList();

        $bindings = [];

        $bindings['Tracks'] = $tracks;

        return view('public.catalogue', $bindings);
    }
}
