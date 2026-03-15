<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\ReleaseTrack;

use App\Domain\Release\Builder as ReleaseBuilder;
use App\Domain\Track\Builder as TrackBuilder;
use App\Domain\Artist\Repo as ArtistRepo;
use App\Domain\Track\Repo as TrackRepo;

class LoadRelease029 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'LoadRelease029';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loads release 029 (Echoes of Explorers).';

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
                ->setName('Echoes of Explorers')
                ->setUrl('echoes-of-explorers')
                ->setArtworkImage('gfd-echoes-of-explorers.jpg')
                ->setTypeAlbum()
                ->setStatusLive()
                ->setReleaseDate('2025-11-14')
                ->setStoreSpotifyLink('https://open.spotify.com/album/6kPKhJnV9lDtEzhIrr1wnI?si=zupwbAEMS7CEF-Fk18fGDw')
                ->setStoreSoundcloudLink('https://soundcloud.com/gfdmusic/sets/echoes-of-explorers')
                ->save();
        $releaseId = $builder->getReleaseId();

        // Create tracks
        $releaseTracks = [
            [
                'name' => 'No Time',
                'url' => 'no-time',
                'store_spotify_link' => 'https://open.spotify.com/track/4RvUsb2Aw32rkDvkGzUUd8?si=c34f97e6836e41e9',
            ],
            [
                'name' => 'Find a Place',
                'url' => 'find-a-place',
                'store_spotify_link' => 'https://open.spotify.com/track/3mcsS3JNF3obmRSHAPFajw?si=e5ef2cb8376e403c',
            ],
            [
                'name' => 'Lights Go Down',
                'url' => 'lights-go-down',
                'store_spotify_link' => 'https://open.spotify.com/track/7fXAlB2Qy9jJN1oeMe6w9v?si=da2edec4d93f4e03',
            ],
            [
                'name' => 'Ground Zero',
                'url' => 'ground-zero',
                'store_spotify_link' => 'https://open.spotify.com/track/42bbpCJzQx7nASbKAtS8nD?si=7c91f1a6db994a25',
            ],
            [
                'name' => 'Breaking Out',
                'url' => 'breaking-out',
                'store_spotify_link' => 'https://open.spotify.com/track/4uGo6ifdqY15nLTsRzRpaG?si=540bebdf954f4311',
            ],
            [
                'name' => 'Narrow Margins',
                'url' => 'narrow-margins',
                'store_spotify_link' => 'https://open.spotify.com/track/6e1Ifm7I8ZJCuIOzK6FwuN?si=51c10adb16734d22',
            ],
            [
                'name' => 'Darkside Beat',
                'url' => 'darkside-beat',
                'store_spotify_link' => 'https://open.spotify.com/track/7Ai0DcvmxtoYkaqlRtzcFP?si=85ad7e9158024a05',
            ],
            [
                'name' => 'First Midnight',
                'url' => 'first-midnight',
                'store_spotify_link' => 'https://open.spotify.com/track/2vMOrp6DikXBHLVq0N7aOS?si=192b0a5a8b9c4afa',
            ],
            [
                'name' => 'Why Don\'t We Go Somewhere',
                'url' => 'why-dont-we-go-somewhere',
                'store_spotify_link' => 'https://open.spotify.com/track/75S8hb6n9jZs23cPy08OFm?si=a531ba8d22d14727',
            ],
            [
                'name' => 'Lost in the Ocean',
                'url' => 'lost-in-the-ocean',
                'store_spotify_link' => 'https://open.spotify.com/track/78XbFIH71QRPIpMxmQ4aIT?si=481e94e0f3c549ad',
            ],
            [
                'name' => 'The High Road',
                'url' => 'the-high-road',
                'store_spotify_link' => 'https://open.spotify.com/track/3mLtgU1ENM9wTbpnbmiOVv?si=2f1b42da4db044d0',
            ],
            [
                'name' => 'Far Away',
                'url' => 'far-away',
                'store_spotify_link' => 'https://open.spotify.com/track/0EkxMM6jhA2pAiNb9VH1nb?si=fcb5f2ad5c4b496a',
            ],
        ];

        $trackNo = 1;

        foreach ($releaseTracks as $trackItem) {

            // Store data
            $name = $trackItem['name'];
            $url = $trackItem['url'];
            $storeSpotifyLink = $trackItem['store_spotify_link'];

            // Check if track exists
            $existingTrack = $this->trackRepo->byUrl($artistGfd, $url);
            if ($existingTrack) {
                $trackId = $existingTrack->id;
            } else {
                // Create track
                $trackBuilder = new TrackBuilder();
                $trackBuilder->buildNew();
                $trackBuilder->setArtist($artistGfd)
                    ->setName($name)
                    ->setUrl($url)
                    ->setStoreSpotifyLink($storeSpotifyLink)
                    ->save();
                $trackId = $trackBuilder->getTrackId();
            }

            // Create release track
            $relTrack = new ReleaseTrack();
            $relTrack->release_id = $releaseId;
            $relTrack->track_id = $trackId;
            $relTrack->release_order = $trackNo++;
            $relTrack->save();
        }
    }
}
