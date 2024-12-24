<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;

use App\Domain\Release\Repo as RepoRelease;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __construct(
        private RepoRelease $repoRelease
    )
    {

    }

    public function show()
    {
        $latestNotAlbum = $this->repoRelease->latestNotAlbum();
        $latestAlbum = $this->repoRelease->latestAlbum();
        $latestNotAlbumSkipFirst = $this->repoRelease->latestNotAlbumSkip(1);

        $bindings = [];
        $bindings['LatestNotAlbum'] = $latestNotAlbum;
        $bindings['LatestAlbum'] = $latestAlbum;
        $bindings['LatestNotAlbumSkipFirst'] = $latestNotAlbumSkipFirst;

        return view('public.welcome', $bindings);
    }
}
