<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LogController::class, 'index'])->name('logs.index');
Route::resource('/logs', LogController::class)->except(['delete'])->middleware('auth');
Route::resource('/logs', LogController::class)->only(['show']);



Route::prefix('logs')->name('logs.')->group(function () {
    Route::get('/goodjob/{log}', [LogController::class, 'goodjob'])->name('goodjob');
    Route::get('/ungoodjob/{log}', [LogController::class, 'ungoodjob'])->name('ungoodjob');
});

Route::middleware('auth')->group(function () {
    Route::resource('/users', UserController::class)->only(['index', 'show', 'edit', 'update', 'store']);
    // フォロー/フォロー解除を追加
    Route::post('users/{user}/follow', [UserController::class, 'follow'])->name('follow');
    Route::delete('users/{user}/unfollow', [UserController::class, 'unfollow'])->name('unfollow');
    Route::post('users', [UserController::class, 'updateImage'])->name('updateImage');
});
Route::get('users/{user}/followings', [UserController::class, 'followings'])->name('users.followings');
Route::get('users/{user}/followers', [UserController::class, 'followers'])->name('users.followers');

Route::get('/top', function () {
    return view('top');
})->name('top');

require __DIR__ . '/auth.php';
