<?php

namespace App\Domain\Artist;

use App\Models\Artist;

class Repo
{
    public function byUrl($url)
    {
        return Artist::where('url', $url)->first();
    }

    public function byName($name)
    {
        return Artist::where('name', $name)->first();
    }
}