<?php

namespace App\Domain\Track;

use App\Models\Release;
use App\Models\Artist;
use App\Models\Track;

use App\Enums\ArtworkPath;
use App\Enums\ReleaseStatus;
use App\Enums\ReleaseType;

class Builder
{
    /**
     * @var Track
     */
    private $track;

    /**
     * @var string
     */
    private $artworkPath;

    public function buildNew()
    {
        $this->track = new Track();
    }

    public function buildExisting(Track $track)
    {
        $this->track = $track;
    }

    public function save()
    {
        $this->track->save();
    }

    public function getTrackId()
    {
        return $this->track->id;
    }

    public function setArtist(Artist $artist)
    {
        $this->track->artist_id = $artist->id;
        return $this;
    }

    public function setName($name)
    {
        $this->track->name = $name;
        return $this;
    }

    public function setUrl($url)
    {
        $this->track->url = $url;
        return $this;
    }

    public function setBlurb($blurb)
    {
        $this->track->blurb = $blurb;
        return $this;
    }

    public function setStoreSpotifyLink($storeLink)
    {
        $this->track->store_spotify_link = $storeLink;
        return $this;
    }

    public function setStoreYoutubeLink($storeLink)
    {
        $this->track->store_youtube_link = $storeLink;
        return $this;
    }

    public function setStoreAppleLink($storeLink)
    {
        $this->track->store_apple_link = $storeLink;
        return $this;
    }

    public function setStoreAmazonLink($storeLink)
    {
        $this->track->store_amazon_link = $storeLink;
        return $this;
    }

    public function setStoreSoundcloudLink($storeLink)
    {
        $this->track->store_soundcloud_link = $storeLink;
        return $this;
    }

    public function setStoreBandcampLink($storeLink)
    {
        $this->track->store_bandcamp_link = $storeLink;
        return $this;
    }
}