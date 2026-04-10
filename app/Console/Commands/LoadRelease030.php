<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Artist;
use App\Models\ReleaseTrack;

use App\Domain\Release\Builder as ReleaseBuilder;
use App\Domain\Track\Builder as TrackBuilder;
use App\Domain\Artist\Repo as ArtistRepo;
use App\Domain\Track\Repo as TrackRepo;

class LoadRelease030 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'LoadRelease030';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loads release 030 (Jupiter) - first release for Castles of the Underground.';

    public function __construct(
        private ArtistRepo $artistRepo,
        private TrackRepo $trackRepo,
    )
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Create Castles of the Underground artist if it doesn't exist
        $artistCotu = $this->artistRepo->byName('Castles of the Underground');
        if (!$artistCotu) {
            $artistCotu = new Artist;
            $values = [
                'name' => 'Castles of the Underground',
                'url' => 'castles-of-the-underground',
                'contact_name' => 'Ben Barden',
                'contact_email' => 'music-spotify@benbarden.com',
                'show_contact_info' => true,
            ];
            $artistCotu->fill($values);
            $artistCotu->save();
            $this->info('Created artist: Castles of the Underground');
        } else {
            $this->info('Artist already exists: Castles of the Underground');
        }

        // Create release
        $builder = new ReleaseBuilder();
        $builder->buildNew();
        $builder->setArtist($artistCotu)
                ->setName('Jupiter')
                ->setUrl('jupiter')
                ->setArtworkImage('jupiter.jpg')
                ->setTypeSingle()
                ->setStatusLive()
                ->setReleaseDate('2026-04-10')
                ->setStoreSpotifyLink('https://open.spotify.com/album/4waR5iPSx2Ya8mpbXrs6S0?si=05GBGuz6SJKOsYdYOPN9cg')
                ->setStoreAppleLink('https://music.apple.com/us/album/jupiter-single/1885759678')
                ->setStoreAmazonLink('https://music.amazon.co.uk/albums/B0GSVHC5FV?marketplaceId=A1F83G8C2ARO7P&musicTerritory=GB&ref=dm_sh_CTzHSDYUzGoQaOwVORwUOobw6')
                ->setStoreYoutubeLink('https://music.youtube.com/playlist?list=OLAK5uy_lLZRypoDUL_yVCnL7q2fR5vuXigE29hAM&si=HSF5XP1HQ0Q1bvW-')
                ->save();
        $releaseId = $builder->getReleaseId();
        $this->info('Created release: Jupiter');

        // Create track
        $trackBuilder = new TrackBuilder();
        $trackBuilder->buildNew();
        $trackBuilder->setArtist($artistCotu)
            ->setName('Jupiter')
            ->setUrl('jupiter')
            ->setStoreSpotifyLink('https://open.spotify.com/track/0nVpWkQt5vXHZcUhkfFDzq?si=9fd5f4d2e24449cf')
            ->setStoreAppleLink('https://music.apple.com/us/song/jupiter/1885759679')
            ->setStoreAmazonLink('https://music.amazon.co.uk/albums/B0GSVHC5FV?marketplaceId=A1F83G8C2ARO7P&musicTerritory=GB&ref=dm_sh_LxhzDmK1MRwrgGWlQNEoHQaNh&trackAsin=B0GSVCNZLF')
            ->setStoreYoutubeLink('https://music.youtube.com/watch?v=EOXi2S9wESY&si=mYc-_SUtokIKDgMJ')
            ->save();
        $trackId = $trackBuilder->getTrackId();
        $this->info('Created track: Jupiter');

        // Create release track
        $relTrack = new ReleaseTrack();
        $relTrack->release_id = $releaseId;
        $relTrack->track_id = $trackId;
        $relTrack->release_order = 1;
        $relTrack->save();

        $this->info('Release 030 loaded successfully!');
    }
}
