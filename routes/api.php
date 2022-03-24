<?php

use App\Http\Controllers\API\PokemonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function(){

    Route::group(['prefix' => 'auth'], function(){

        Route::post('register', [RegisterController::class, 'register'])->name('auth.register');

        Route::post('login', [LoginController::class, 'login'])->name('auth.login');

        Route::group(['middleware' => 'auth:sanctum'], function(){

            Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');

        });

    });

    Route::group(['middleware' => 'auth:sanctum'], function(){

        Route::group(['prefix' => 'users'], function(){

            Route::get('', [UserController::class, 'index'])->name('users.index');

            Route::get('{id}', [UserController::class, 'show'])->name('users.show')->where('id', '[0-9]+');

        });

        Route::group(['prefix' => 'pokemons'], function(){

            Route::get('', [PokemonController::class, 'index'])->name('pokemons.index');

            Route::post('', [PokemonController::class, 'store'])->name('pokemons.create');

            Route::put('{id}', [PokemonController::class, 'update'])->name('pokemons.update')->where('id', '[0-9]+');

            Route::get('{id}', [PokemonController::class, 'show'])->name('pokemons.show')->where('id', '[0-9]+');
        });

    });
});
