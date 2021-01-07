<?php

use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LinkController::class, 'index'])
    ->middleware('guest')
    ->name('links');

Route::get('/links/{uuid}', [LinkController::class, 'click'])
    ->name('click');

Route::get('/stats', [LinkController::class, 'stats'])
    ->middleware('guest')
    ->name('stats');

Route::get('/welcome', function () {
    return view('welcome');
})->middleware(['guest'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
