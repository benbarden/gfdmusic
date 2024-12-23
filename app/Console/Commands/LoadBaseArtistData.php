<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Artist;
use App\Models\Track;
use App\Models\Release;
use App\Models\ReleaseTrack;

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
        $artist->name = 'GFD';
        $artist->url = 'gfd';
        $artist->social_threads_id = '@gfdmusic';
        $artist->website_url = 'https://www.gfdmusic.com';
        $artist->store_spotify_link = 'https://open.spotify.com/artist/6QyNK9na4rgC9TrQx0K3wE?si=U-mESuVwSbSSSIl31aYtlw&dl_branch=1';
        $artist->store_soundcloud_link = 'https://soundcloud.com/gfdmusic';
        $artist->store_youtube_link = 'https://music.youtube.com/channel/UCwZe1Xxl-LFN_CTsd3sVbIA?si=zo1ELJ6tU2TY1xys';
        $artist->store_apple_link = 'https://music.apple.com/us/artist/gfd/1530319703';
        $artist->store_amazon_link = 'https://amazon.co.uk/music/player/artists/B07FXZPBRH/gfd?marketplaceId=A1F83G8C2ARO7P&musicTerritory=GB&ref=dm_sh_ovyyibDtSYUVOQdaKcPzjNahr';
        $artist->save();

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
    }
}