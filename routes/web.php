<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialAuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\TwitterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/app/followers');
    }
    return view('welcome');
})->middleware('auth');

Auth::routes();

Route::get('twitter', [SocialAuthController::class, 'twitterRedirect'])->name('auth/twitter');
Route::get('callback', [SocialAuthController::class, 'loginWithTwitter']);
Route::get('/home', [ApiController::class, 'getData'])->middleware('auth');
Route::get('/details/{id}', [ApiController::class, 'showDetails'])->middleware('auth');
Route::get('/twitter-data', [ApiController::class, 'getTwitterData']);
Route::get('/twitter-data', [ApiController::class, 'getTwitterData'])->name('twitter.index');
Route::get('/app/followers', [ApiController::class, 'index'])->name('followers.index');
Route::get('/app/follower/{id}/details', [ApiController::class, 'show'])->name('followers.show');
Route::get('/app/follower/{id}/twubric.json', [ApiController::class, 'getFollowerDetails']);
