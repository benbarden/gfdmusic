<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Artist;
use App\Models\Track;
use App\Models\Release;
use App\Models\ReleaseTrack;

class DeleteBaseArtistData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DeleteBaseArtistData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes base artist data for GFD.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        ReleaseTrack::truncate();
        Release::truncate();
        Track::truncate();
        Artist::truncate();
    }
}
