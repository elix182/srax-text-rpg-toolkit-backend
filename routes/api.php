<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'hero'], function () {
    Route::get('', 'HeroController@list');
    Route::get('random', 'HeroController@random');
    Route::get('dashboard', 'HeroController@dashboard');
    Route::get('{id}', 'HeroController@find');
    Route::post('', 'HeroController@create');
    Route::delete('{id}', 'HeroController@delete');
    Route::put('{id}', 'HeroController@edit');
  
    Route::middleware('auth:api')->group(function () {
    });
});

Route::group(['prefix' => 'herorace'], function () {
    Route::get('', 'HeroRaceController@list');
});

Route::group(['prefix' => 'heroclass'], function () {
    Route::get('', 'HeroClassController@list');
    Route::get('herorace/{id}', 'HeroClassController@findByRace');
});

Route::group(['prefix' => 'weapon'], function () {
    Route::get('', 'WeaponController@list');
    Route::get('heroclass/{id}', 'WeaponController@findByClass');
});

Route::group(['prefix' => 'monster'], function () {
    Route::get('', 'MonsterController@list');
    Route::get('random', 'MonsterController@random');
    Route::get('dashboard', 'MonsterController@dashboard');
    Route::get('{id}', 'MonsterController@find');
    Route::post('', 'MonsterController@create');
    Route::delete('{id}', 'MonsterController@delete');
    Route::put('{id}', 'MonsterController@edit');
});

Route::group(['prefix' => 'monsterrace'], function () {
    Route::get('', 'MonsterRaceController@list');
});

Route::group(['prefix' => 'monsterability'], function () {
    Route::get('', 'MonsterAbilityController@list');
    Route::get('monsterrace/{id}', 'MonsterAbilityController@findByRace');
});