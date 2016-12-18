<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth']], function () {
    Route::post('/busca', 'BuscaController@index');

    Route::get('/consultas', 'ConsultasController@index');

    Route::get('/consultas/{id}', [
        'as' => 'id',
        'uses' => 'ConsultasController@abre_registro'
    ]);

    Route::get('/consultas/apaga/{id}', [
        'as' => 'id',
        'uses' => 'ConsultasController@apaga_registro'
    ]);
});