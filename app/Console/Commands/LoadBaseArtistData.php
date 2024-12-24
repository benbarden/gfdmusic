<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Artist;
use App\Models\Track;
use App\Models\Release;
use App\Models\ReleaseTrack;

use League\Csv\Reader;

class LoadBaseArtistData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'LoadBaseArtistData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loads some base data for GFD.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $artist = new Artist;
        $values = [
            'name' => 'GFD',
            'url' => 'gfd',
            'social_threads_id' => '@gfdmusic',
            'website_url' => 'https://www.gfdmusic.com',
            'store_spotify_link' => 'https://open.spotify.com/artist/6QyNK9na4rgC9TrQx0K3wE?si=U-mESuVwSbSSSIl31aYtlw&dl_branch=1',
            'store_soundcloud_link' => 'https://soundcloud.com/gfdmusic',
            'store_youtube_link' => 'https://music.youtube.com/channel/UCwZe1Xxl-LFN_CTsd3sVbIA?si=zo1ELJ6tU2TY1xys',
            'store_apple_link' => 'https://music.apple.com/us/artist/gfd/1530319703',
            'store_amazon_link' => 'https://amazon.co.uk/music/player/artists/B07FXZPBRH/gfd?marketplaceId=A1F83G8C2ARO7P&musicTerritory=GB&ref=dm_sh_ovyyibDtSYUVOQdaKcPzjNahr',
        ];
        $artist->fill($values);
        $artist->save();

        // *** TRACKS *** //
        $csv = Reader::createFromPath(storage_path('gfd-data-upload-tracks.csv'), 'r');
        $csv->setHeaderOffset(0);

        //$header = $csv->getHeader(); //returns the CSV header record

        $records = $csv->getRecords();
        foreach ($records as $record) {
            $track = new Track;
            $values = [
                'name' => $record['name'],
                'url' => $record['url'],
                'artist_id' => $record['artist_id'],
                'blurb' => $record['blurb'],
                'store_spotify_link' => $record['store_spotify_link'],
                'store_soundcloud_link' => $record['store_soundcloud_link'],
            ];
            $track->fill($values);
            $track->save();
        }

        // *** RELEASES *** //
        $csv = Reader::createFromPath(storage_path('gfd-data-upload-releases.csv'), 'r');
        $csv->setHeaderOffset(0);

        //$header = $csv->getHeader(); //returns the CSV header record

        $records = $csv->getRecords();
        foreach ($records as $record) {
            $release = new Release;
            $values = [
                'name' => $record['name'],
                'url' => $record['url'],
                'artist_id' => $record['artist_id'],
                'artwork_local_url' => '/assets/artwork/gfd/'.$record['artwork_local_url'],
                'blurb' => $record['blurb'],
                'type' => $record['type'],
                'status' => $record['status'],
                'release_date' => $record['release_date'],
                'store_spotify_link' => $record['store_spotify_link'],
                'store_youtube_link' => $record['store_youtube_link'],
                'store_apple_link' => $record['store_apple_link'],
                'store_amazon_link' => $record['store_amazon_link'],
                'store_soundcloud_link' => $record['store_soundcloud_link'],
            ];
            $release->fill($values);
            $release->save();

            $releaseId = $release->id;
            $trackIds = explode(',', $record['track_ids']);
            $trackNo = 1;
            foreach ($trackIds as $id) {
                $relTrack = new ReleaseTrack;
                $values = [
                    'release_id' => $releaseId,
                    'track_id' => $id,
                    'release_order' => $trackNo++
                ];
                $relTrack->fill($values);
                $relTrack->save();
            }
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
