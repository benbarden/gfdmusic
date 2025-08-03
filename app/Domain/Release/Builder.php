<?php

namespace App\Domain\Release;

use App\Models\Release;
use App\Models\Artist;

use App\Enums\ArtworkPath;
use App\Enums\ReleaseStatus;
use App\Enums\ReleaseType;

class Builder
{
    /**
     * @var Release
     */
    private $release;

    /**
     * @var Artist
     */
    private $artist;

    /**
     * @var string
     */
    private $artworkPath;

    public function buildNew()
    {
        $this->release = new Release();
    }

    public function buildExisting(Release $release)
    {
        $this->release = $release;
    }

    public function save()
    {
        $this->release->save();
    }

    public function getReleaseId()
    {
        return $this->release->id;
    }

    public function setArtist(Artist $artist)
    {
        $this->artist = $artist;
        match ($artist->name) {
            'GFD' => $this->artworkPath = ArtworkPath::PATH_GFD,
            'Roads to Atlantis' => $this->artworkPath = ArtworkPath::PATH_RTA,
            default => throw new \Exception('Unhandled artist: '.$artist->name),
        };
        $this->release->artist_id = $artist->id;
        return $this;
    }

    public function setName($name)
    {
        $this->release->name = $name;
        return $this;
    }

    public function setUrl($url)
    {
        $this->release->url = $url;
        return $this;
    }

    public function setBlurb($blurb)
    {
        $this->release->blurb = $blurb;
        return $this;
    }

    public function setArtworkImage($file)
    {
        $this->release->artwork_local_url = $this->artworkPath.$file;
        return $this;
    }

    public function setTypeAlbum()
    {
        $this->release->type = ReleaseType::TYPE_ALBUM;
        return $this;
    }

    public function setStatusLive()
    {
        $this->release->status = ReleaseStatus::STATUS_LIVE;
        return $this;
    }

    public function setReleaseDate($date)
    {
        $this->release->release_date = $date;
        return $this;
    }

    public function setStoreSpotifyLink($storeLink)
    {
        $this->release->store_spotify_link = $storeLink;
        return $this;
    }

    public function setStoreYoutubeLink($storeLink)
    {
        $this->release->store_youtube_link = $storeLink;
        return $this;
    }

    public function setStoreAppleLink($storeLink)
    {
        $this->release->store_apple_link = $storeLink;
        return $this;
    }

    public function setStoreAmazonLink($storeLink)
    {
        $this->release->store_amazon_link = $storeLink;
        return $this;
    }

    public function setStoreSoundcloudLink($storeLink)
    {
        $this->release->store_soundcloud_link = $storeLink;
        return $this;
    }

    public function setStoreBandcampLink($storeLink)
    {
        $this->release->store_bandcamp_link = $storeLink;
        return $this;
    }
}