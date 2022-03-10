<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\GoodjobController;

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
Route::resource('/logs', LogController::class)->except(['index', 'delete'])->middleware('auth');
Route::resource('/logs', LogController::class)->only(['show']);

Route::get('/logs/goodjob/{log}', [LogController::class, 'goodjob'])->name('log.goodjob');
Route::get('/logs/ungoodjob/{log}', [LogController::class, 'ungoodjob'])->name('log.ungoodjob');

Route::get('/top', function () {
    return view('top');
})->name('top');

require __DIR__ . '/auth.php';
