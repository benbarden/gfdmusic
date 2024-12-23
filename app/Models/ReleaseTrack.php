<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ReleaseTrack extends Model
{
    use HasFactory;

    protected $table = 'release_tracks';

    protected $fillable = ['release_id', 'track_id', 'release_order'];

    public function track(): HasOne
    {
        return $this->hasOne(Track::class, 'id', 'track_id');
    }

    public function release(): HasOne
    {
        return $this->hasOne(Release::class, 'id', 'release_id');
    }
}
