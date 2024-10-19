<?php

use App\Http\Controllers\PokedexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', [PokedexController::class, 'index'])
->name('pokedex');

Route::middleware('auth')->group(function () {
    Route::resource('pokemon', PokemonController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
