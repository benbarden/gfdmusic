<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\ReleaseTrack;

use App\Domain\Release\Builder as ReleaseBuilder;
use App\Domain\Track\Builder as TrackBuilder;
use App\Domain\Artist\Repo as ArtistRepo;
use App\Domain\Track\Repo as TrackRepo;

class LoadRelease031 extends Command
{
    protected $signature = 'LoadRelease031';

    protected $description = 'Loads release 031 (Sun Rising) - second release for Castles of the Underground.';

    public function __construct(
        private ArtistRepo $artistRepo,
        private TrackRepo $trackRepo,
    )
    {
        parent::__construct();
    }

    public function handle()
    {
        $artistCotu = $this->artistRepo->byName('Castles of the Underground');
        if (!$artistCotu) {
            $this->error('Artist not found: Castles of the Underground');
            return;
        }

        // Create release
        $builder = new ReleaseBuilder();
        $builder->buildNew();
        $builder->setArtist($artistCotu)
                ->setName('Sun Rising')
                ->setUrl('sun-rising')
                ->setArtworkImage('sun-rising.jpg')
                ->setTypeSingle()
                ->setStatusLive()
                ->setReleaseDate('2026-05-22')
                ->setStoreSpotifyLink('https://open.spotify.com/album/5MtH5tOR9hECuWGcKyeibp?si=NzgnidkfQdSDNIUrMtDiAw')
                ->setStoreAppleLink('https://music.apple.com/us/album/sun-rising-single/1896411984')
                ->setStoreAmazonLink('https://music.amazon.co.uk/albums/B0GZW6N5HY')
                ->setStoreYoutubeLink('https://music.youtube.com/playlist?list=OLAK5uy_mkL6_W1Tll3KVSemNvRpX0RxTW7-yeQZo')
                ->save();
        $releaseId = $builder->getReleaseId();
        $this->info('Created release: Sun Rising');

        // Create track
        $trackBuilder = new TrackBuilder();
        $trackBuilder->buildNew();
        $trackBuilder->setArtist($artistCotu)
            ->setName('Sun Rising')
            ->setUrl('sun-rising')
            ->setStoreSpotifyLink('https://open.spotify.com/track/7aDVRnqdTR3mYgtjVHJHDq?si=b65d622198834cea')
            ->setStoreAppleLink('https://music.apple.com/us/song/sun-rising/6767179472')
            ->setStoreAmazonLink('https://music.amazon.co.uk/albums/B0GZW6N5HY?marketplaceId=A1F83G8C2ARO7P&musicTerritory=GB&ref=dm_sh_FS9PyHrKo7WCGAkvm0N2q7vk2&trackAsin=B0GZW7B7HK')
            ->setStoreYoutubeLink('https://music.youtube.com/watch?v=k2yva-GRvZg&si=CVjLFtijOLvXyQXE')
            ->save();
        $trackId = $trackBuilder->getTrackId();
        $this->info('Created track: Sun Rising');

        // Create release track
        $relTrack = new ReleaseTrack();
        $relTrack->release_id = $releaseId;
        $relTrack->track_id = $trackId;
        $relTrack->release_order = 1;
        $relTrack->save();

        $this->info('Release 031 loaded successfully!');
    }
}
