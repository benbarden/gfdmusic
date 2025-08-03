<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Track;
use App\Models\Release;
use App\Models\ReleaseTrack;

class LoadRelease026 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'LoadRelease026';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loads release 026 (Wasted on Your Love).';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $artworkPathGfd = '/assets/artwork/gfd/';

        // Create release
        $releaseWOYL = new Release;
        $values = [
            'name' => 'Wasted on Your Love',
            'url' => 'wasted-on-your-love',
            'artist_id' => 1,
            'artwork_local_url' => $artworkPathGfd.'gfd-wasted-on-your-love.jpg',
            'blurb' => '',
            'type' => Release::TYPE_SINGLE,
            'status' => Release::STATUS_LIVE,
            'release_date' => '2025-01-31',
            'store_spotify_link' => 'https://open.spotify.com/album/4jJX1IsKWI1Kys8YfgJRZ8?si=O1RV1mzFTHuiQk0rx89TGQ',
            'store_youtube_link' => '',
            'store_apple_link' => '',
            'store_amazon_link' => '',
            'store_soundcloud_link' => '',
            'store_bandcamp_link' => '',
        ];
        $releaseWOYL->fill($values);
        $releaseWOYL->save();

        $idReleaseWOYL = $releaseWOYL->id;

        // Create tracks
        $track = new Track;
        $values = [
            'name' => 'Wasted on Your Love',
            'url' => 'wasted-on-your-love',
            'artist_id' => 1,
            'blurb' => '',
            'store_spotify_link' => 'https://open.spotify.com/track/7la076Cq7ffrZhhh1aSYZa?si=663a801c87524014',
            'store_soundcloud_link' => '',
        ];
        $track->fill($values);
        $track->save();
        $idTrackWOYL1 = $track->id;

        // Set up release tracks
        $trackIds = [$idTrackWOYL1];
        $trackNo = 1;
        foreach ($trackIds as $id) {
            $relTrack = new ReleaseTrack;
            $values = [
                'release_id' => $idReleaseWOYL,
                'track_id' => $id,
                'release_order' => $trackNo++
            ];
            $relTrack->fill($values);
            $relTrack->save();
        }


        /*
        $track = new Track;
        $values = [
            'name' => 'Epic Journey',
            'url' => 'epic-journey',
            'artist_id' => $artist->id,
            'store_spotify_link' => 'https://open.spotify.com/track/7BU6t0ScDc2LZys04ESick?si=de6ea38ff48f47e7',
            'store_soundcloud_link' => 'https://soundcloud.com/gfdmusic/epic-journey',
        ];
        $track->fill($values);
        $track->save();

        $release = new Release;
        $values = [
            'name' => 'Epic Journey',
            'url' => 'epic-journey',
            'artist_id' => $artist->id,
            'artwork_local_url' => '/assets/artwork/gfd/epic-journey.jpg',
            'type' => Release::TYPE_SINGLE,
            'status' => Release::STATUS_LIVE,
            'release_date' => '2020-09-18',
            'store_spotify_link' => 'https://open.spotify.com/album/24VsS7DN65HnVq75C6tvQo?si=uh-xdWk-S8WRQJUbgWdEdg'
        ];
        $release->fill($values);
        $release->save();

        $relTrack1 = new ReleaseTrack;
        $values = [
            'release_id' => $release->id,
            'track_id' => $track->id,
            'release_order' => 1
        ];
        $relTrack1->fill($values);
        $relTrack1->save();
        */
    }
}
