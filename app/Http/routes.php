<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    
    Route::get('all', 'GameController@index')->name('game.all');
    
    Route::get('details/{gameId}', 'GameController@details')->name('game.details');
    
    Route::get('addgameform', 'GameController@addGameForm')->name('game.addform');
    
    Route::post('addgame', 'GameController@addGame')->name('game.add');
    
    Route::post('deletegame/{id}/delete', 'GameController@deleteGame')->name('game.delete');
    
    Route::get('details/{gameId}/edit', 'GameController@editGame')->name('game.editform');
    
    
    
});
