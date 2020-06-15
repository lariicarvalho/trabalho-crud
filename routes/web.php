<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/alunos', 'AlunoController@index')->name('alunos');
Route::get('/alunos/create', 'AlunoController@create');
Route::post('/alunos/store', 'AlunoController@store');
Route::get('/alunos/{id}/edit', 'AlunoController@edit');
Route::put('/alunos/{id}/update', 'AlunoController@update');
Route::delete('/alunos/{id}/destroy', 'AlunoController@destroy')->name('alunos.delete');