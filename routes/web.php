<?php

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

Route::get('/series', 'SeriesController@index')->name('index')  ;
Route::get('/series/criar', 'SeriesController@create')->name('criar_series')->middleware('autenticador');
Route::post('/series/criar', 'SeriesController@store')->middleware('autenticador');
Route::delete('/series/{id}','SeriesController@destroy')->middleware('autenticador');
Route::post('/series/{id}/editaNome','SeriesController@editaNome')->middleware('autenticador');

Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');

Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')->middleware('autenticador');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/entrar', 'EntrarController@index');
Route::post('/entrar', 'EntrarController@entrar');

Route::get('/registrar', 'RegistrarController@create');
Route::post('/registrar', 'RegistrarController@store');

Route::get('/sair', function()
{
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/entrar');
});
