<?php

use Illuminate\Http\Request;

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

Route::get('pessoas', 'PessoaController@index');
Route::get('pessoa/{id}', 'PessoaController@show');
Route::post('pessoa', 'PessoaController@store');
Route::put('pessoa/{id}', 'PessoaController@update');
Route::delete('pessoa/{id}', 'PessoaController@delete');
