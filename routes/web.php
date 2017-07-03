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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('correspondencia',[
	'uses'  => 'CorrespondenciaController@CorrespondenciaHome',
	'as'    => 'correspondencia'
]);

Route::post('correspondenciaStore', 'CorrespondenciaController@CorrespondenciaStore');

Route::get('correspondenciaEdit/{id}', 'CorrespondenciaController@CorrespondenciaEdit');

Route::put('correspondenciaUpdate/{id}',[
    'as' => 'correspondenciaUpdate',
    'uses' => 'CorrespondenciaController@correspondenciaUpdate'
]);

Route::delete('correspondenciaDelete/{id}',[
	'as' => 'correspondenciaDelete',
	'uses' => 'CorrespondenciaController@CorrespondenciaDelete'
]);
