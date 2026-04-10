<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Domain\Artist\Repo as ArtistRepo;

class SetArtistBios extends Command
{
    protected $signature = 'SetArtistBios';

    protected $description = 'Sets bios for all artists.';

    public function __construct(
        private ArtistRepo $artistRepo,
    )
    {
        parent::__construct();
    }

    public function handle()
    {
        // Castles of the Underground
        $artist = $this->artistRepo->byUrl('castles-of-the-underground');
        if ($artist) {
            $artist->bio = "Dance and trance music that takes you on a journey.\n\nHidden worlds. Late nights. That feeling of being transported somewhere else entirely. Good dance music brings back memories of people and places from long ago - somewhere between memory and imagination.\n\nThat's what Castles of the Underground is about.";
            $artist->save();
            $this->info('Set bio for: Castles of the Underground');
        }

        // GFD
        $artist = $this->artistRepo->byUrl('gfd');
        if ($artist) {
            $artist->bio = "Catchy, upbeat, funky music with vocal samples and synth hooks.\n\nThe name comes from \"greenfield development\" - starting fresh. Before GFD, there were years of self-released music, shared with friends and family. Bespoke printed CDs, shipped worldwide. It was a fun hobby, but made it hard for the music to be shared.\n\nGFD changed that. The first release, Epic Journey, landed on streaming services in September 2020. The catalogue has grown to include several albums and dozens of tracks, with funk remaining at the core.";
            $artist->save();
            $this->info('Set bio for: GFD');
        }

        // Roads to Atlantis
        $artist = $this->artistRepo->byUrl('roads-to-atlantis');
        if ($artist) {
            $artist->bio = "Experimental and videogame-style music. Soundtracks for games and films that don't exist.\n\nThis is the style of music I wrote between 2005-2009, but it's not just an archive. There are remixes of old tracks, and entirely new tracks that continue the style. Available on Bandcamp and Soundcloud.";
            $artist->save();
            $this->info('Set bio for: Roads to Atlantis');
        }

        $this->info('Done!');
    }
}
