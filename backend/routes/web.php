<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;

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
Route::resource('/logs', LogController::class)->except(['index'])->middleware('auth');

Route::get('/top', function () {
    return view('top');
})->name('top');

require __DIR__ . '/auth.php';
