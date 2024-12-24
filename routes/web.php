<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicSite\WelcomeController;
use App\Http\Controllers\PublicSite\AboutController;
use App\Http\Controllers\PublicSite\ReleaseController;
use App\Http\Controllers\PublicSite\TrackController;
use App\Http\Controllers\PublicSite\ArtistProfileController;

use App\Http\Controllers\PublicSite\CatalogueController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeController::class, 'show'])->name('welcome');

Route::get('/about', [AboutController::class, 'show'])->name('about');

Route::get('/catalogue/tracks', [CatalogueController::class, 'tracks'])->name('catalogue.tracks');
Route::get('/catalogue/releases', [CatalogueController::class, 'releases'])->name('catalogue.releases');

Route::get('/{artistUrl}/releases/{releaseUrl}', [ReleaseController::class, 'show'])->name('release.show');

Route::get('/{artistUrl}/tracks/{trackUrl}', [TrackController::class, 'show'])->name('track.show');

Route::get('/{artistUrl}', [ArtistProfileController::class, 'show'])->name('artist-profile.show');

//Route::match(['get', 'post'], '/join-waiting-list', [WaitingListController::class, 'signup'])->name('join-waiting-list');

Route::middleware('auth')->group(function () {

    //Route::get('/user/dashboard', [ProfileController::class, 'dashboard'])->name('user.dashboard');

});

require __DIR__.'/auth.php';

Route::middleware('auth.staff')->group(function() {

    //Route::get('/staff/dashboard', [StaffDashboardController::class, 'show'])->name('staff.dashboard');

    //Route::get('/staff/invite-from-waiting-list/{waitingListUser}', [StaffDashboardController::class, 'inviteFromWaitingList'])->name('staff.invite-from-waiting-list');

});
