<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\ReleaseTrack;

use App\Domain\Release\Builder as ReleaseBuilder;
use App\Domain\Track\Builder as TrackBuilder;
use App\Domain\Artist\Repo as ArtistRepo;
use App\Domain\Track\Repo as TrackRepo;

class LoadRelease028 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'LoadRelease028';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loads release 028 (Find a Place).';

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
        $artistGfd = $this->artistRepo->byName('GFD');
        if (!$artistGfd) {
            exit('Cannot find artist: GFD');
        }

        // Create release
        $builder = new ReleaseBuilder();
        $builder->buildNew();
        $builder->setArtist($artistGfd)
                ->setName('Find a Place')
                ->setUrl('find-a-place')
                ->setArtworkImage('gfd-find-a-place.jpg')
                ->setTypeSingle()
                ->setStatusLive()
                ->setReleaseDate('2025-10-10')
                ->setStoreSpotifyLink('https://open.spotify.com/album/6HS1zgSdjzNPLm5ApgDnvj?si=SVfdk00SRhO1KZaTTKtKAg')
                ->save();
        $releaseId = $builder->getReleaseId();

        // Check if track exists
        $trackUrl = 'find-a-place';
        $existingTrack = $this->trackRepo->byUrl($artistGfd, $trackUrl);
        if ($existingTrack) {
            $trackId = $existingTrack->id;
        } else {
            // Create track
            $trackBuilder = new TrackBuilder();
            $trackBuilder->buildNew();
            $trackBuilder->setArtist($artistGfd)
                ->setName('Find a Place')
                ->setUrl($trackUrl)
                ->setStoreSpotifyLink('https://open.spotify.com/track/3mcsS3JNF3obmRSHAPFajw?si=e5ef2cb8376e403c')
                ->save();
            $trackId = $trackBuilder->getTrackId();
        }

        // Create release track
        $relTrack = new ReleaseTrack();
        $relTrack->release_id = $releaseId;
        $relTrack->track_id = $trackId;
        $relTrack->release_order = 1;
        $relTrack->save();
    }
}
