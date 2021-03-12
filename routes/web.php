<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/teams', [TeamController::class, 'index'])->name('teams')->middleware('checkRole');
Route::get('/createTeam', [TeamController::class, 'create'])->name('createTeam')->middleware('checkRole');
Route::get('/team/{id}/edit', [TeamController::class, 'edit'])->name('editTeam')->middleware('checkRole');
Route::post('/teams', [TeamController::class, 'store'])->name('storeTeam')->middleware('checkRole');
Route::put('team/{id}', [TeamController::class, 'update'])->name('updateTeam')->middleware('checkRole');
Route::delete('/team/{id}', [TeamController::class, 'destroy'])->name('deleteTeam')->middleware('checkRole');

Route::get('/players', [PlayerController::class, 'index'])->name('players')->middleware('checkRole');
Route::get('/createPlayer', [PlayerController::class, 'create'])->name('createPlayer')->middleware('checkRole');
Route::get('/player/{id}/edit', [PlayerController::class, 'edit'])->name('editPlayer')->middleware('checkRole');
Route::post('/players', [PlayerController::class, 'store'])->name('storePlayer')->middleware('checkRole');
Route::put('/player/{id}', [PlayerController::class, 'update'])->name('updatePlayer')->middleware('checkRole');
Route::delete('/player/{id}', [PlayerController::class, 'destroy'])->name('deletePlayer')->middleware('checkRole');

Route::get('/games', [GameController::class, 'index'])->name('games')->middleware('checkRole');
Route::get('/createGame', [GameController::class, 'create'])->name('createGame')->middleware('checkRole');
Route::get('/game/{id}/edit', [GameController::class, 'edit'])->name('editGame')->middleware('checkRole');
Route::post('/games', [GameController::class, 'store'])->name('storeGame')->middleware('checkRole');
Route::put('/game/{id}', [GameController::class, 'update'])->name('updateGame')->middleware('checkRole');
Route::delete('/game/{id}', [GameController::class, 'destroy'])->name('deleteGame')->middleware('checkRole');