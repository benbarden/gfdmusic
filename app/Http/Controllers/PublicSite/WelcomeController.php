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
        $latestRelease = $this->repoRelease->latest();

        $bindings = [];
        $bindings['LatestRelease'] = $latestRelease;

        return view('public.welcome', $bindings);
    }
}
