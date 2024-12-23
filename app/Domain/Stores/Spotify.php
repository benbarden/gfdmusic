<?php

namespace App\Domain\Stores;

class Spotify
{
    // Guide
    // https://developer.spotify.com/documentation/embeds/tutorials/using-the-iframe-api

    // Example link
    // https://open.spotify.com/track/7BU6t0ScDc2LZys04ESick?si=de6ea38ff48f47e7

    public function getTrackId($url)
    {
        if (!str_starts_with($url, 'https://open.spotify.com/track/')) return null;

        $trackData = explode('https://open.spotify.com/track/', $url);

        $trackLink = $trackData[1];

        $trackId = explode('?', $trackLink);

        return $trackId[0];
    }
}