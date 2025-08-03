<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Track;
use App\Models\Release;
use App\Models\ReleaseTrack;

use App\Domain\Release\Builder as ReleaseBuilder;
use App\Domain\Track\Builder as TrackBuilder;
use App\Domain\Artist\Repo as ArtistRepo;
use App\Domain\Track\Repo as TrackRepo;

class LoadRelease027 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'LoadRelease027';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loads release 027 (Anthems).';

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
                ->setName('Anthems')
                ->setUrl('anthems')
                ->setArtworkImage('gfd-anthems.jpg')
                ->setTypeAlbum()
                ->setStatusLive()
                ->setReleaseDate('2025-06-13')
                ->setStoreSpotifyLink('https://open.spotify.com/album/0tnbXVa9GLpHmy6LKb9Q4s?si=ocl-bC41TnSgfTQA35offw')
                ->setStoreSoundcloudLink('https://soundcloud.com/gfdmusic/sets/anthems')
                ->save();
        $anthemsReleaseId = $builder->getReleaseId();

        // Create tracks
        $releaseTracks = [
            [
                'name' => 'Alive',
                'url' => 'alive',
                'store_spotify_link' => 'https://open.spotify.com/track/0SnVaLeLW4Sj7SVJM70pez?si=5bf7b7ad0d5f4fac',
                'store_soundcloud_link' => 'https://soundcloud.com/gfdmusic/alive',
            ],
            [
                'name' => 'Told You So',
                'url' => 'told-you-so',
                'store_spotify_link' => 'https://open.spotify.com/track/17bmMH9mnSofOtwJdvLtXV?si=46fc3cf2486b4055',
                'store_soundcloud_link' => 'https://soundcloud.com/gfdmusic/told-you-so',
            ],
            [
                'name' => 'You\'re the One I Want',
                'url' => 'youre-the-one-i-want',
                'store_spotify_link' => 'https://open.spotify.com/track/6WNGG1d2N8BcJYcF26xzfI?si=c9519ff09066402e',
                'store_soundcloud_link' => 'https://soundcloud.com/gfdmusic/youre-the-one-i-want',
            ],
            [
                'name' => 'Wasted on Your Love',
                'url' => 'wasted-on-your-love',
                'store_spotify_link' => 'https://open.spotify.com/track/0unrD7MyHGVWg3a5KK6DSU?si=4dfe611376104dbc',
                'store_soundcloud_link' => 'https://soundcloud.com/gfdmusic/wasted-on-your-love',
            ],
            [
                'name' => 'I Don\'t Depend',
                'url' => 'i-dont-depend',
                'store_spotify_link' => 'https://open.spotify.com/track/6Fm7khw8JtPEqqNvjrIOEq?si=1c790a80c4844aca',
                'store_soundcloud_link' => 'https://soundcloud.com/gfdmusic/i-dont-depend',
            ],
            [
                'name' => 'Staying Out Forever',
                'url' => 'staying-out-forever',
                'store_spotify_link' => 'https://open.spotify.com/track/1tyXV8tN8TyRo3a33LL5O4?si=cc088953106244c1',
                'store_soundcloud_link' => 'https://soundcloud.com/gfdmusic/staying-out-forever',
            ],
            [
                'name' => 'I Just Wanna Be With You',
                'url' => 'i-just-wanna-be-with-you',
                'store_spotify_link' => 'https://open.spotify.com/track/30X7LoGxgEcgCp0cpTx2iD?si=8bb8edd3753a4db7',
                'store_soundcloud_link' => 'https://soundcloud.com/gfdmusic/i-just-wanna-be-with-you',
            ],
            [
                'name' => 'Take it Slow',
                'url' => 'take-it-slow',
                'store_spotify_link' => 'https://open.spotify.com/track/0A0TClMz55EYESF0I2Qgha?si=cbf30904be60417f',
                'store_soundcloud_link' => 'https://soundcloud.com/gfdmusic/take-it-slow',
            ],
            [
                'name' => 'Aquatrance',
                'url' => 'aquatrance',
                'store_spotify_link' => 'https://open.spotify.com/track/6uPjOM4aLk8ojoXtSdF0Xe?si=90760b7f0f424f66',
                'store_soundcloud_link' => 'https://soundcloud.com/gfdmusic/aquatrance',
            ],
            [
                'name' => 'Like That',
                'url' => 'like-that',
                'store_spotify_link' => 'https://open.spotify.com/track/3Uqil6k1C05uY0am7fQznh?si=be4b3ffe9d024bdd',
                'store_soundcloud_link' => 'https://soundcloud.com/gfdmusic/like-that',
            ],
            [
                'name' => 'Missing You',
                'url' => 'missing-you',
                'store_spotify_link' => 'https://open.spotify.com/track/5ghwzN530pBHhWYGOpBPTy?si=7d05850b6025430a',
                'store_soundcloud_link' => 'https://soundcloud.com/gfdmusic/missing-you',
            ],
            [
                'name' => 'Eternal Glory',
                'url' => 'eternal-glory',
                'store_spotify_link' => 'https://open.spotify.com/track/72kgTrUtFrpDdgwIcdv9Kb?si=739e613e618f45b9',
                'store_soundcloud_link' => 'https://soundcloud.com/gfdmusic/eternal-glory',
            ],
            /*
            [
                'name' => '',
                'url' => '',
                'store_spotify_link' => '',
                'store_soundcloud_link' => '',
            ],
            */
        ];

        $trackNo = 1;

        foreach ($releaseTracks as $trackItem) {

            // Store data
            $name = $trackItem['name'];
            $url = $trackItem['url'];
            $storeSpotifyLink = $trackItem['store_spotify_link'];
            $storeSoundcloudLink = $trackItem['store_soundcloud_link'];

            // Check if track exists
            $existingTrack = $this->trackRepo->byUrl($artistGfd, $url);
            if ($existingTrack) {
                $trackId = $existingTrack->id;
            } else {
                // Create track
                $builder = new TrackBuilder();
                $builder->buildNew();
                $builder->setArtist($artistGfd)
                    ->setName($name)
                    ->setUrl($url)
                    ->setStoreSpotifyLink($storeSpotifyLink)
                    ->setStoreSoundcloudLink($storeSoundcloudLink)
                    ->save();
                $trackId = $builder->getTrackId();
            }

            // Create release track
            $relTrack = new ReleaseTrack();
            $relTrack->release_id = $anthemsReleaseId;
            $relTrack->track_id = $trackId;
            $relTrack->release_order = $trackNo++;
            $relTrack->save();

        }
    }
}
