<?php

use App\Http\Controllers\PokemonController;
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

Route::get('/', [PokemonController::class, 'index']);

Route::group(['prefix' => 'pokemons', 'middleware' => 'auth'], function(){

    Route::post('', [PokemonController::class, 'store'])->name('app.pokemons.create');

    Route::put('{id}', [PokemonController::class, 'update'])->name('app.pokemons.update')->where('id', '[0-9]+');

    Route::get('{id}', [PokemonController::class, 'show'])->name('app.pokemons.show')->where('id', '[0-9]+');
});

Auth::routes();
