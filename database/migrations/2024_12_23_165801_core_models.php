<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('url', 100);
            $table->string('social_threads_id', 100)->nullable();
            $table->string('social_bluesky_id', 100)->nullable();
            $table->string('social_twitter_id', 100)->nullable();
            $table->text('website_url')->nullable();
            $table->text('store_spotify_link')->nullable();
            $table->text('store_soundcloud_link')->nullable();
            $table->text('store_youtube_link')->nullable();
            $table->text('store_apple_link')->nullable();
            $table->text('store_amazon_link')->nullable();
            $table->text('store_bandcamp_link')->nullable();
            $table->timestamps();

            $table->unique('url', 'url');
        });

        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('url', 100);
            $table->integer('artist_id');
            $table->text('blurb')->nullable();
            $table->text('store_spotify_link')->nullable();
            $table->text('store_soundcloud_link')->nullable();
            $table->text('store_youtube_link')->nullable();
            $table->text('store_apple_link')->nullable();
            $table->text('store_amazon_link')->nullable();
            $table->text('store_bandcamp_link')->nullable();
            $table->timestamps();

            $table->unique('url', 'url');
            $table->index('artist_id', 'artist_id');
        });

        Schema::create('releases', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('url', 100);
            $table->text('blurb')->nullable();
            $table->text('artwork_local_url')->nullable();
            $table->string('type', 30);
            $table->string('status', 30);
            $table->integer('artist_id');
            $table->date('release_date')->nullable();
            $table->text('store_spotify_link')->nullable();
            $table->text('store_soundcloud_link')->nullable();
            $table->text('store_youtube_link')->nullable();
            $table->text('store_apple_link')->nullable();
            $table->text('store_amazon_link')->nullable();
            $table->text('store_bandcamp_link')->nullable();
            $table->timestamps();

            $table->unique('url', 'url');
            $table->index('type', 'type');
            $table->index('status', 'status');
            $table->index('artist_id', 'artist_id');
        });

        Schema::create('release_tracks', function (Blueprint $table) {
            $table->id();
            $table->integer('release_id');
            $table->integer('track_id');
            $table->integer('release_order');
            $table->timestamps();

            $table->index('release_id', 'release_id');
            $table->index('track_id', 'track_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artists');
        Schema::dropIfExists('tracks');
        Schema::dropIfExists('releases');
        Schema::dropIfExists('release_tracks');
    }
};
