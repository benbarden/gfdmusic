<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct(
    )
    {

    }

    public function show()
    {
        $bindings = [];

        return view('public.about', $bindings);
    }
}
